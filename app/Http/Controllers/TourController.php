<?php

namespace App\Http\Controllers;

use App\Pos;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $pos = [10];
        
        $answers = DB::table('answers')->where('user_id', $user_id)->orderBy('pos_id','desc')->get();
        foreach ($answers as $value) {
            array_push($pos, $value->pos_id);
        }
        return view('dashboard', compact('pos'));
    }

    function rekap() {
        $students = User::where('role','Student')->get();
        $groups = ['--Show All--'];
        foreach ($students as $value) {
            if(!array_search($value->group,$groups)){
                array_push($groups, $value->group);
            }
        }

        // $ans = User::with('answers')->get();
        // dd($ans[2]->answers[1]->pivot->answer);
        // dd($ans);
        // $students = User::first();
        // $pos = Pos::where("password","AAAAA")->question()->first();
        // $answers = $students[0]->answers()->get();
        // dd($answers[3]->pivot->answer);
        return view('rekap', compact('groups','students'));
    }

    function changeGroup(Request $request) {
        $group = $request->group;
        if($group == '--Show All--'){
            $students = User::where('role','Student')->get();
        }else{
            $students = User::where('role','Student')->where('group',$group)->get();
        }
        // var_dump($students[0]);
        return response()->json(array(
            'students' => $students
        ), 200);
    }

    function checkPass(Request $request) {
        $pass = $request->pass;
        $user_id = Auth::user()->id;
        $pos = Pos::where("password",$pass)->first();
        $questions = [];
        $name = "";
        if($pos != null){
            $answers = DB::table('answers')->where('user_id', $user_id)->where('pos_id', $pos->id)->get();
            if(count($answers) == 0){
                $msg = "GET";
                $res = Question::where('pos_id', $pos->id)->get('question');
                foreach ($res as $value) {
                    array_push($questions, $value->question);
                }
                $name = $pos->name;
            }else{
                $msg = "INVALID";
            }
        }else{
            $msg = "FALSE";
        }

        return response()->json(array(
            'pos' => $name,
            'questions' => $questions,
            'msg' => $msg
        ), 200);
    }

    function submitAnswers(Request $request){
        $user_id = Auth::user()->id;
        $pass = $request->pass;
        $answers = $request->answers;
        $pos = Pos::where("password",$pass)->first();
        $questions = Question::where('pos_id',$pos->id)->get();

        foreach ($questions as $key => $value) {
            DB::table('answers')->insert([
                "user_id" => $user_id,
                "question_id" => $value->id,
                "pos_id" => $pos->id,
                "answer" => $answers[$key]
            ]);
        }

        return response()->json(array(
            'msg' => "Congratulations, you have finished " . $pos->name
        ), 200);
    }


}

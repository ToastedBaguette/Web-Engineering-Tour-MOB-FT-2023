<?php

namespace App\Http\Controllers;

use App\Pos;
use App\Question;
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

    function checkPass(Request $request) {
        $pass = $request->pass;
        $user_id = Auth::user()->id;
        $pos = Pos::where("password",$pass)->first();
        $questions = [];
        if($pos != null){
            $answers = DB::table('answers')->where('user_id', $user_id)->where('pos_id', $pos->id)->get();
            if(count($answers) == 0){
                $msg = "GET";
                $res = Question::where('pos_id', $pos->id)->get('question');
                foreach ($res as $value) {
                    array_push($questions, $value->question);
                }
            }else{
                $msg = "INVALID";
            }
        }else{
            $msg = "FALSE";
        }

        return response()->json(array(
            'pos' => $pos->name,
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

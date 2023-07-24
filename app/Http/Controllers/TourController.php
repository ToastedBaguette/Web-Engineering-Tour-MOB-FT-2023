<?php

namespace App\Http\Controllers;

use App\Pos;
use Illuminate\Http\Request;

class TourController extends Controller
{
    function checkPass(Request $request) {
        $pass = $request->pass;
        $result = Pos::where("password",$pass)->first();
        if($result != null){
            $msg = "GET";
        }else{
            $msg = "FALSE";
        }

        return response()->json(array(
            'msg' => $msg
        ), 200);
    }
}

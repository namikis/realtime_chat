<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\chatLogic;

class chatController extends Controller
{
    public function post_match(Request $request){
        $post_id = $request->post_id;
        $opp_id = $request->opp_id;
        $loginInfo = session('loginInfo');
        $user_id = $loginInfo['user_id'];

        $room = chatLogic::getRoom($user_id, $opp_id, $post_id);

        return view('chat_room', $room);
                
    }
}

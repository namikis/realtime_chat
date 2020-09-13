<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\chatLogic;
use App\Model\Chat;

class chatController extends Controller
{
    public function chat_room(Request $request){
        $loginInfo = session('loginInfo');
        $room_id = $request->room;

        $raw = Chat::getRoom($room_id);
        $room = chatLogic::getRoom($raw->user_id, $raw->host_id, $raw->post_id, 2, $room_id);

        return view('chat_room', $room)
                    ->with('loginInfo', $loginInfo);
    }

    public function post_match(Request $request){
        $post_id = $request->post_id;
        $opp_id = $request->opp_id;
        $loginInfo = session('loginInfo');
        $user_id = $loginInfo['user_id'];

        $room = chatLogic::getRoom($user_id, $opp_id, $post_id);

        return view('chat_room', $room)
                    ->with('loginInfo', $loginInfo);
                
    }

    public function post_list(Request $request){
        $post_id = $request->post_id;
        $rooms = Chat::getList($post_id);
        $loginInfo = session('loginInfo');

        return view('chat_list')
                ->with('rooms', $rooms)
                ->with('loginInfo', $loginInfo);
    }
}

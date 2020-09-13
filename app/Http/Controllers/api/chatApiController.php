<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Chat;

class chatApiController extends Controller
{
    public function getText(Request $request){
        $room_id = $request->room_id;

        $data['textItems'] = Chat::getText($room_id);

        return json_encode($data);
    }

    public function sendText(Request $request){
        $chat_detail = $request->all();

        Chat::insertText($chat_detail);

        return json_encode(true);
    }
}

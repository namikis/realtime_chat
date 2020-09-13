<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    public static function getRoomById($post_id, $user_id){
        $room = DB::table('rooms')
            ->where('post_id', $post_id)
            ->where('user_id', $user_id)
            ->first();

        if(isset($room->id)){
            return $room->id;
        }else{
            return null;
        }
    }

    public static function getRoom($room_id){
        $room = DB::table('rooms')
                    ->where('id', $room_id)
                    ->first();

        return $room;
    }

    public static function getList($post_id){
        $rooms = DB::table('rooms')
                    ->join('users', 'users.id', '=', 'rooms.user_id')
                    ->select('rooms.id as room_id', 'post_id', 'host_id', 'user_id', 'users.name as name')
                    ->where('post_id', $post_id)
                    ->get();
        return $rooms;
    }
    
    public static function insertRoom($data){
        DB::table('rooms')
            ->insert($data);

        return DB::getPdo()->lastInsertId();
    }

    public static function getText($room_id){
        $texts = DB::table('chat_contents')
                    ->where('room_id', $room_id)
                    ->get();

        return $texts;
    }

    public static function insertText($chat_detail){
        $data = array(
            'room_id' => $chat_detail['room_id'],
            'sender_id' => $chat_detail['sender_id'],
            'chat_text' => $chat_detail['chat_text']
        );

        DB::table('chat_contents')
            ->insert($data);
    }
}

<?php

namespace App\Logic;

use Illuminate\Database\Eloquent\Model;
use App\Model\Chat;
use App\Model\User;

class chatlogic extends Model
{
    public static function getRoom($user_id, $host_id, $post_id, $host=1, $room_id=null){
        //Roomが作ってあればそれを開く
        if($room_id==null){
            $room['room_id'] = Chat::getRoomById($post_id, $user_id);
        }else{
            $room['room_id'] = $room_id;
        }

        if($room['room_id'] == null){
            $data = array(
                'host_id' => $host_id,
                'user_id' => $user_id,
                'post_id' => $post_id
            );
            $room['room_id'] = Chat::insertRoom($data);
            
        }

        if($host == 1){
            //ユーザー側からのアクセス
            $room['user'] = User::getById($user_id);
            $room['opp'] = User::getById($host_id);
        }else if($host == 2){
            //ホスト側からのアクセス
            $room['opp'] = User::getById($user_id);
            $room['user'] = User::getById($host_id);
        }
        

        return $room;
    }
}

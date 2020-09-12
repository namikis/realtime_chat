<?php

namespace App\Logic;

use Illuminate\Database\Eloquent\Model;
use App\Model\Chat;
use App\Model\User;

class chatlogic extends Model
{
    public static function getRoom($user_id, $opp_id, $post_id){
        //Roomが作ってあればそれを開く
        $room['room_id'] = Chat::getRoomById($post_id);

        if($room['room_id'] == null){
            $data = array(
                'host_id' => $opp_id,
                'user_id' => $user_id,
                'post_id' => $post_id
            );
            $room['room_id'] = Chat::insertRoom($data);
            
        }

        $room['user'] = User::getById($user_id);
        $room['opp'] = User::getById($opp_id);

        return $room;
    }
}

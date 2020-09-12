<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    public static function getRoomById($post_id){
        $room = DB::table('rooms')
            ->where('post_id', '=', $post_id)
            ->first();

        if(isset($room->id)){
            return $room->id;
        }else{
            return null;
        }
    }
    
    public static function insertRoom($data){
        DB::table('rooms')
            ->insert($data);

        return DB::getPdo()->lastInsertId();
    }
}

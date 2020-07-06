<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public static function insertPost($data){
        DB::table('posts')
            ->insert($data);
    }

    public static function getPosts($user_id){
        $select = "
            id,
            post_title,
            post_text,
            user_id
        ";
        $posts = DB::table('posts')
            ->select(DB::raw($select))
            ->where('user_id', '!=', $user_id)
            ->get();
        
        return $posts;
    }

    public static function getById($id){
        $select = "
            id,
            post_title,
            post_text,
            user_id
        ";
        $post = DB::table('posts')
            ->select(DB::raw($select))
            ->where('id', '=', $id)
            ->first();
        
        return $post;
    }
}

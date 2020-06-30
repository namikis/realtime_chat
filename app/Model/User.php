<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public static function insertUser($data){
        $user['name'] = $data['name'];
        $user['email'] = $data['email'];
        $user['password'] =$data['password'];

        DB::table('users')
            ->insert($user);

        return DB::getPdo()->lastInsertId();
    }

    public static function getByEmail($email){
        $select = "
            id,
            name
        ";
        $user = DB::table('users')
            ->select(DB::raw($select))
            ->where('email', $email)
            ->first();

        return $user;
    }
}

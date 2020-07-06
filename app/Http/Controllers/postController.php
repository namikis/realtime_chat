<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;

class postController extends Controller
{
    public function index(){
        $loginInfo = session('loginInfo');
        $posts = Post::getPosts($loginInfo['user_id']);

        return view('index')
        ->with('loginInfo', $loginInfo)
        ->with('page_title', "投稿一覧")
        ->with('posts', $posts);
    }

    public function post_form(){
        $loginInfo = session('loginInfo');
        return view('post_form')
        ->with('loginInfo', $loginInfo)
        ->with('page_title', "投稿する");
    }

    public function post_done(Request $request){
        $loginInfo = session('loginInfo');
        $data['post_title'] = $request->title;
        $data['post_text'] = $request->text;
        $data['user_id'] = $loginInfo['user_id'];

        Post::insertPost($data);
        return redirect('/index');
    }

    public function post_detail(Request $request){
        
        $post_id = $request->id;
        $post = Post::getById($post_id);

        return view('post_detail')
            ->with('post', $post);
    }
}

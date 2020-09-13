<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Chat;

class postController extends Controller
{
    public function index(){
        $loginInfo = session('loginInfo');
        $posts = Post::getPosts($loginInfo['user_id']);

        return view('index')
        ->with('loginInfo', $loginInfo)
        ->with('page_title', "投稿一覧")
        ->with('page_type', 'other')
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
        return redirect('/post/mine');
    }

    public function post_detail(Request $request){
        $loginInfo = session('loginInfo');
        $post_id = $request->id;
        $post = Post::getById($post_id);

        return view('post_detail')
            ->with('type', 'other')
            ->with('loginInfo', $loginInfo)
            ->with('post', $post);
    }

    public function post_detail_mine(Request $request){
        $loginInfo = session('loginInfo');
        $post_id = $request->id;
        $post = Post::getById($post_id);

        return view('post_detail')
            ->with('type', 'mine')
            ->with('loginInfo', $loginInfo)
            ->with('post', $post);
    }

    public function post_mine(){
        $loginInfo = session('loginInfo');
        $posts = Post::getPosts($loginInfo['user_id'], "mine");

        return view('index')
        ->with('loginInfo', $loginInfo)
        ->with('page_title', "自分の投稿")
        ->with('page_type', 'mine')
        ->with('posts', $posts);
    }
}

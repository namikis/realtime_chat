@extends('layouts/header_footer')
@section('content')

    <div class="container">
        <h1>{{ $page_title }}</h1>
        <div class="post_wrapper">
            @foreach($posts as $post)
                <div class="post_item">
                    <a href="/index/post/detail?id={{$post->id}}">{{ $post->post_title }}</a>
                </div>
            @endforeach
        </div>
        <div class="post">
            <a href="/index/post">投稿する</a>
        </div>
    </div>
@endsection

<style>
    .post{
        text-align:center;
    }

    .post a{
        color:white;
        background-color:red;
        padding:4px 10px;
        border-radius:30px;
    }

    .post_wrapper{
        min-height:200px;
        margin:30px;
        background-color:rgba(0, 0, 255, 0.2);
    }
</style>
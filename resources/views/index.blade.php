@extends('layouts/header_footer')
@section('content')

    <div class="container">
        <h1>{{ $page_title }}</h1>
        <div class="post_wrapper">
            @foreach($posts as $post)
                @if($page_type=="other")
                    <div class="post_item">
                        <a href="/index/post/detail/{{$post->id}}"><span class="post_title">{{ $post->post_title }}</span>host : {{ $post->name }}</a>
                    </div>
                @else
                    <div class="post_item">
                        <a href="/index/post/detail/mine/{{$post->id}}"><span class="post_title">{{ $post->post_title }}</span></a>
                    </div>
                @endif
            @endforeach
        </div>
        @if($page_type == "mine")
            <div class="post">
                <a href="/index/post">投稿する</a>
            </div>
        @endif
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
        padding:20px 0;
    }

    .post_item{
        margin:10px 15px;
        border:2px solid red;
        border-radius:5px;
        padding:10px 5px;
    }

    .post_item a{
        font-size:20px;
        color:black;
    }

    .post_title{
        font-size:22px;
        font-weight:bold;
        padding:0 10%;
    }
</style>
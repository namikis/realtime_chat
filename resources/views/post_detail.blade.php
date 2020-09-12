@extends('layouts/header_footer')
@section('content')
    <div class="container">
        <div class="detail_wrapper">
            <h1>{{ $post->post_title }}</h1>
            <div class="detail_text">
                <p>{{ $post->post_text }}</p>
            </div>
        </div>
        <div class="matching">
            <form action="/index/post/match" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{$post->id}}" name="post_id"> 
                <input type="hidden" value="{{$post->user_id}}" name="opp_id">
                <input type="submit" value="チャットする">
            </form>
        </div>
    </div>
@endsection

<style>
    .detail_wrapper{
        border:2px solid black;
        padding:30px;
    }

    .detail_wrapper h1{
        text-align:center;
    }

    .detail_text{
        margin:20px auto;
        width:70%;
    }

    .matching{
        text-align:center;
        margin:40px;
    }
</style>
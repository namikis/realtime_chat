@extends('layouts/header_footer')
@section('content')
    <div class="container">
        <h1>{{ $page_title }}</h1>
        <div class="post_wrapper">
            <form action="/index/post" method="post">
            {{ csrf_field() }}
                <div class="input_title">
                    <p>タイトル</p>
                    <input type="text" name="title">
                </div>
                <div class="post_text">
                    <p>本文</p>
                    <textarea name="text" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="submit_wrapper">
                    <input type="submit" value="送信">
                </div>
            </form>
        </div>
    </div>
@endsection('content')
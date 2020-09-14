@extends('layouts/header_footer')
@section('content')

<link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <div class="container">
        <div class="chat_wrapper">
            <h2>{{ $user->name }} -> {{ $opp->name }}</h2>
            <div class="chat_container">
                <div id="app">
                    <chat
                        login_info="{{ json_encode($loginInfo) }}"
                        room_id="{{ json_encode($room_id) }}"
                        opp_id = "{{ json_encode($opp->id) }}"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection

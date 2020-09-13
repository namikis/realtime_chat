@extends('layouts/header_footer')
@section('content')
    <div class="container">
        @if(isset($rooms[0]))
            @foreach($rooms as $room)
                <div class="room_item">
                    <a href="/chat?room={{$room->room_id}}">{{ $room->name }}</a>
                </div>
            @endforeach
        @else
            <h2>マッチングしていません</h2>
        @endif
    </div>
@endsection
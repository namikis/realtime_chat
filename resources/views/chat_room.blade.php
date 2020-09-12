@extends('layouts/header_footer')
@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <h2>{{ $opp->name }}</h2>
    </div>
@endsection
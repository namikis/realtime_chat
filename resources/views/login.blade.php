@extends('layouts/header_footer')
@section('content')
    <div class="top_wrapper container">
                ログイン
    </div>
    <div class="container">
        <div class="signUp_wrapper">
            
            <div class="signUp_item">
            <form action="{{ url('/login') }}" method="post">
            {{ csrf_field() }}

                <div class="input_item">
                    <p>メールアドレス</p>
                    <input type="text" name="email">
                </div>

                <div class="input_item">
                    <p>パスワード</p>
                    <input type="password" name="pass">
                </div>
                <div class="submit_item">
                    <input type="submit" value="ログイン">
                </div>

            </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .signUp_wrapper{
        text-align:center;
    }

    .top_wrapper{
        font-size:20px;
        font-weight:bold;
    }

    .input_item p{
        font-size:18px;
    }

    .input_item input{
        width:50%;
    }

    .input_item, .submit_item{
        margin-top:20px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat network!</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="header">
        <div class="header_left_wrapper">
            <h1>chat network!</h1>
        </div>
        <div class="header_right_wrapper">
            @if(!isset($loginInfo))
                <div class="header_right_item">
                    <a href="/login">ログイン</a>
                </div>
                <div class="header_right_item">
                    <a href="/signUp">新規登録</a>
                </div>
            @endif
        </div>
    </div>
    @yield('content')
</body>
</html>

<style>
    .header{
        background-color:red;
    }
    .header_left_wrapper h1{
        color:white;
        padding:10px 50px;
    }

    .header{
        display:flex;
        align-items:center;
        justify-content:space-between;
    }

    .header_right_wrapper{
        display:flex;
        margin-right:70px;
    }

    .header_right_item{
        margin-right:30px;
    }
</style>
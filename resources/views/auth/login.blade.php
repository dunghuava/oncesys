<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('/')}}">
        <title>Đăng nhập</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="public/images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="public/css/auth.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body class="login">
        <form class="f-login" action="{{'auth/login'}}" method="post">
            @csrf
            <div class="f-head">
                <p style="color: #484444;">Đăng nhập hệ thống</p><br>
                 <p>
                     <img style="width: 200px" src="public/images/logo.png" alt="">
                 </p>
            </div>
            @if (count($errors)>0)
            <div class="f-errors">
                <p>Invalid Username or Password</p>
            </div>
            @endif
            <div class="f-body">
                <p><input type="text" name="username"></p>
                <p><input type="password" name="password"></p>
            </div>
            <div class="f-footer">
                <p>
                    <button onclick="this.innerHTML='Vui lòng chờ...'"type="submit">Đăng nhập</button>
                </p>
            </div>
        </form>
    </body>
</html>

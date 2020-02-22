<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('/')}}">
        <link rel="shortcut icon" href="public/images/favicon.png" type="image/x-icon">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <script src="public/js/jquery.js"></script>
        <script src="public/bootstrap/js/moment.min.js"></script>
        <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="public/bootstrap/css/datetimepicker.css">
        <link rel="stylesheet" href="public/css/frontend.css">
        <link rel="stylesheet" href="public/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="public/select2/select2.css">
        <script src="public/bootstrap/js/bootstrap.js"></script>
        <script src="public/bootstrap/js/validator.js"></script>
        <style>
            .datepicker td, .datepicker th{font-size: 13px}
            @media (min-width: 1200px){
                .container {
                    margin-top: 2px;
                    width: 100%;
                    margin: auto
                }
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        @include('components.dialog-style')
        @yield('content')
        @include('components.spinner');
    </body>
    <script>
        window.onscroll = function() {myFunction()};
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky_del")
        } else {
            navbar.classList.remove("sticky_del");
        }
        }
    </script>
    <script src="public/select2/select2.full.js"></script>
    <script src="public/bootstrap/js/datetimepicker.min.js"></script>
</html>

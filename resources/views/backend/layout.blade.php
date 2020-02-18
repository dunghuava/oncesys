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
        <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="public/bootstrap/css/datetimepicker.css">
        <link rel="stylesheet" href="public/css/backend.css">
        <link rel="stylesheet" href="public/select2/select2.css">
        <link rel="stylesheet" href="public/printjs/print.min.css">
        <link rel="stylesheet" href="public/font-awesome/css/font-awesome.css">
        <script src="public/bootstrap/js/bootstrap.js"></script>
        <script src="public/bootstrap/js/validator.js"></script>
        <script src="public/js/chart.min.js"></script>
        <script src="public/printjs/print.min.js"></script>
        
        <style>
            .f-row label{
                min-width: 60px !important;
                max-width: 60px !important;
            }
            .nav a{padding:12px !important}
            .nav li:hover a{background: #1bb51b}
            .nav li.active a{background: #1bb51b}
            .datepicker td, .datepicker th{font-size: 13px}
            @media (min-width: 1200px){
                .container {
                    margin-top: 0px;
                    width: 1300px;
                }
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        @include('components.dialog-style')
        @include('backend.nav')
        @yield('content')
        @include('components.spinner')
        <span style="display: none" id="page">@yield('page')</span>
        <script> 
            $(document).ready(function () {  
                $('#'+$('#page').html()).addClass('active');           
                $(".datepicker-s").datepicker({ 
                        autoclose: true, 
                        todayHighlight: true,
                        format: 'dd/mm/yyyy'
                }).datepicker('update', new Date());

                window.onscroll = function() {myFunction()};
                var navbar = document.getElementById("navbar");
                var sticky = navbar.offsetTop;
                function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
                }
                $('.select2').select2();
            });
        </script>
        <script src="public/bootstrap/js/datetimepicker.min.js"></script>
        <script src="public/select2/select2.full.js"></script>
    </body>
</html>

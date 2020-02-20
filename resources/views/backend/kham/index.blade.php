@extends('backend.layout')
@section('title','Khám bệnh')
@section('page','kham_benh')

@section('content')
    <style>
    .f-row label {
        min-width: 70px !important;
        max-width: 70px !important;
    }
    </style>
    <div id="front_end"></div>
    <div id="backend-thuoc">
        <div class="container">
            @include('backend.kham.dialog')
            <div class="row">
                <div class="col-md-3" style="padding-top: 0px">
                    <div class="boxs">
                        @include('backend.kham.left')
                    </div>
                </div>
                <div class="col-md-9 pl0">
                    <div class="boxs"><br>
                        @include('backend.kham.main')
                        @include('components.notify')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.item-user-left').click(function (e) { 
                $('.item-user-left').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    <script src="public/js/app.js"></script>
@endsection
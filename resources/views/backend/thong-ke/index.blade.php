@extends('backend.layout')
@section('title','Thống kê')
@section('page','thong_ke')

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
            <p></p>
            <div class="row">
                <div class="col-md-9">
                    <div class="boxs">
                        @include('backend.thong-ke.main')
                    </div>
                </div>
                <div class="col-md-3">
                     @include('components.tool')
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/chart_thongke.js"></script>
@endsection
@extends('backend.layout')
@section('title','Hóa đơn')
@section('page','hoa_don')

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
                <div class="col-md-12">
                    <div class="boxs">
                        @include('backend.hoa-don.main')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/app.js"></script>
@endsection
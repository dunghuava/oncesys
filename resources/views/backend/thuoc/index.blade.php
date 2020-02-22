@extends('backend.layout')
@section('title','Thuốc')
@section('page','thuoc')
    
@section('content')
    <div id="front_end"></div>
    <div id="backend-thuoc">
        <div class="container">
            <p></p>
            <div class="row">
                <div class="col-md-3" style="padding-top: 0px">
                    <div class="boxs">
                        @include('backend.thuoc.left')
                    </div>
                </div>
                <div class="col-md-9 pl0">
                    <div class="boxs">
                        @include('backend.thuoc.main')
                        @include('components.notify')
                    </div>
                </div>
            </div>
        </div>
        @include('backend.thuoc.dialog')
    </div>
    <script src="public/js/app.js"></script>
@endsection
@extends('backend.layout')
@section('title','Khám bệnh')
@section('content')
    <div class="container">
        <p></p>
        <div class="row">
            <div class="col-md-9">
                <div class="boxs">
                    @include('backend.dasboard.main')
                </div>
            </div>
            <div class="col-md-3">
                <div class="boxs">
                    @include('components.tool')
                </div>
            </div>
        </div>
    </div>
@endsection
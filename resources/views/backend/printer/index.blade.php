@extends('backend.layout')
@section('title','Printer')
@section('page','print')
    
@section('content')
    <div id="front_end"></div>
    <div id="backend-thuoc">
        <div class="container">
            <p></p>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 box p0">
                    <div id="page_for_print" class="boxs">
                        @include('backend.printer.main')
                    </div>
                </div>
                <div class="col-md-3">
                    <button onclick="printJS('page_for_print', 'html')" class="btn btn-success">
                        <span class="fa fa-print"></span>
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('backend.layout')
@section('title','Khám bệnh')
@section('content')
    <div class="container">
        <p></p>
        <div class="row">
            <div class="col-md-9 bg-w" id="left_d">
                <div class="boxs">
                    @include('backend.dasboard.main')
                </div>
            </div>
            <div class="col-md-3" id="right_d">
                <div class="boxs">
                    @include('components.tool')
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#left_d').css({'min-height':$('#right_d').height()+'px'})
        });
    </script>
@endsection
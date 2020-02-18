@extends('frontend.layout')
@section('title','Tiếp tân')

@section('content')
    <div id="front_end">
        @include('frontend.nav')
        <br><br>
        <div class="container">
            <div class="row bg-w">
                <form id="f-form" style="width:100%" action="f" method="post" role="form" data-toggle="validator">
                    <div  class="col-md-9 p5" style="border-right:4px solid #EBEBEB">
                        <h4 class="mb0"><b> [1] Thông tin bệnh nhân</b></h4><hr>
                        @include('frontend.form')
                    </div>
                    <div class="col-md-3 pr0">
                        <div class="box bg-w p5">
                            <h4 class="mb0"><b>[3] Hóa đơn</b></h4><hr>
                            @include('frontend.right')
                        </div>
                    </div>
                </form>
            </div>
            @include('frontend.dialog')
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({ 
                    autoclose: true, 
                    todayHighlight: true,
                    format: 'dd/mm/yyyy'
            }).datepicker('update', new Date());
        });
    </script>
    <script type="application/javascript" src="public/js/app.js"></script>
@endsection
<div class="row m0 p10 pl0" style="padding-top: 0px">
    <div class="col-md-12 p0 mb10 text-right">
        <form class="form-inline" action="{{asset('b/bills/search/')}}" method="get">
            <div class="row">
                @csrf
                <div class="col-md-9 text-left">
                    <h3 class="m0"><b>Lịch sử khám bệnh</b></h3>
                </div>
                <div class="col-md-3 input-group" style="display: inline-flex">
                    <input value="{{isset($_GET['q']) ? $_GET['q']:''}}" name="q" required style="width: 100%;" placeholder="Tìm kiếm theo mã, tên bệnh nhân"  type="text" class="form-control">
                    <button style="border-top-left-radius:0px;border-bottom-left-radius:0px" type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </form>
    </div><hr>
    <div class="col-md-12 p0">
        @include('backend.hoa-don.table')
        <br><br>
    </div>
</div>
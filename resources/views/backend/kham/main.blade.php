<div class="row m0">
    <div class="col-md-4 p0">
        <h3 class="m0"><b>Khám bệnh</b></h3><br>
    </div>
    <div class="col-md-8 text-right">
        <button class="btn btn-success">
            <span class="fa fa-arrow-down"></span>
            More
        </button>
    </div>
</div>
<div class="row m0 p10 pl0">
    <div class="col-md-12 bg-w p10 mb10" style="border:1px solid #ccc">
        <h4 class="m0 current-name">
            <b id="thong_tin">Vui lòng chọn bệnh nhân</b>
        </h4>
        <div class="col-md-12"><hr style="margin-bottom: 2px;margin-top: 4px">
            <p class="m0"><b style="font-size: 12px">Số ĐT: </b><span id="dien_thoai">Chưa xác định</span></p>
            <p><b style="font-size: 12px">Địa chỉ: </b><span id="dia_chi">Chưa xác định</span></p>
        </div>
    </div><hr>
    <div class="col-md-12" style="background: rgba(214,214,214,0.4);border:1px solid #ccc"><br>
        @include('backend.kham.form')
    </div>
</div>
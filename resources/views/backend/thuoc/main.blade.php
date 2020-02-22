<div class="row m0">
    <div class="col-md-4 p0">
        <h3 class="m0"><b>Quản lý thuốc <span style="opacity: 0.2">|</span> thủ thuật</b></h3><br>
    </div>
    <div class="col-md-8 text-right">
        <button v-on:click="isAdd=true;isUpdate=false" class="btn btn-success">
            <span class="fa fa-plus"></span>
            Thêm thuốc
        </button>
        <button class="btn btn-success">
            <span class="fa fa-arrow-down"></span>
            More
        </button>
    </div>
</div>
<div class="row m0">
    <div class="col-md-12 pl0">
        @include('backend.thuoc.table')
    </div>
</div>
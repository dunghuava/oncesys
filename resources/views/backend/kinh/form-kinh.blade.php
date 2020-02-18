<div class="row mb10">
    <div class="col-md-4">
        <div class="f-row">
            <label for="">Mã</label>
            <input required v-model="kinh.ma" type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-8">
        <div class="f-row">
            <label for="">Tên kính</label>
            <input required v-model="kinh.ten" type="text" class="form-control">
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-10">
        <div class="f-row">
            <label for="">Loại</label>
            <select v-model="kinh.id_loai" class="form-control">
                <option value="0">--Lựa chọn</option>
                <option v-for="item in list_kinh_cate" :value="item.id">@{{item.ten}}</option>
            </select>
        </div>
    </div>
    <div class="col-md-2 text-right">
        <div class="f-row">
            <button v-on:click="isAddCate=true" style="background: #ccc" class="btn btn-default form-control"> <span class="fa fa-plus"></span></button>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-4">
        <div class="f-row">
            <label for="">Giá vốn</label>
            <input v-model="kinh.gia_von" required  type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="f-row">
            <label for="">Giá bán</label>
            <input v-model="kinh.gia_ban" required  type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="f-row">
            <label for="">Số lượng</label>
            <input v-model="kinh.so_luong" required  type="text" class="form-control">
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-6">
        <div class="f-row">
            <label for="">NSX</label>
            <input v-model="kinh.ngay_sx" type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control datepicker">
        </div>
    </div>
    <div class="col-md-6">
        <div class="f-row">
            <label for="">HSD</label>
            <input v-model="kinh.han_sd" type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control datepicker">
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Chi tiết</label>
            <textarea v-model="kinh.chi_tiet" style="resize: none" class="form-control" rows="4"></textarea>
        </div>
    </div>
</div>
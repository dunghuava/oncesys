@csrf
<div class="bg-x">
    <div class="row mb10">
        <div class="col-md-3">
            <div class="f-row">
                <label for="">Mã</label>
                <input id="next_index" next-index="{{count($BenhNhan)}}" required name="ma_bn" v-model="benh_nhan.ma" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-9">
            <div class="f-row">
                <label for="">Họ tên</label>
                <input required name="ho_ten" v-model="benh_nhan.ho_ten" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb10">
        <div class="col-md-3">
            <div class="f-row">
                <label for="">Giới tính</label>
                <select name="gioi_tinh" v-model="benh_nhan.gioi_tinh" class="form-control">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="f-row">
                <label for="">Ngày sinh</label>
                <input autocomplete="off" name="ngay_sinh" v-model="benh_nhan.ngay_sinh" placeholder="ex: 20/10/1994" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="f-row">
                <label for="">Tuổi</label>
                <input required placeholder="" name="tuoi" v-model="benh_nhan.tuoi" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb10">
        <div class="col-md-3">
            <div class="f-row">
                <label for="">Số điện thoại</label>
                <input placeholder="SĐT" name="dien_thoai" v-model="benh_nhan.dien_thoai" type="text" class="form-control">
            </div>
        </div>
        <div class="col-md-9">
            <div class="f-row">
                <label for="">Địa chỉ</label>
                <input placeholder="Số nhà, tên đường.." name="dia_chi" v-model="benh_nhan.dia_chi" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="row mb10">
        <div class="col-md-4">
            <div class="f-row">
                <label for="">Tỉnh / T.phố</label>
                <select @change="getDistrict()" name="province_id" v-model="benh_nhan.province_id" class="form-control select2">
                    <option value="0">--Lựa chọn--</option>
                    @foreach ($Province as $item)
                        <option value="{{$item->id}}">{{$item->_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="f-row">
                <label for="">Quận / Huyện</label>
                <select @change="getWard()" name="district_id" v-model="benh_nhan.district_id"  class="form-control select2">
                    <option value="0">--Lựa chọn--</option>
                <option v-for="district in vi_location.district" :value="district.id">
                        @{{district._prefix+' '+district._name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="f-row">
                <label for="">Phường / Xã</label>
                <select name="ward_id" v-model="benh_nhan.ward_id" class="form-control select2">
                     <option value="0">--Lựa chọn--</option>
                    <option v-for="ward in vi_location.ward" :value="ward.id">
                        @{{ward._prefix+' '+ward._name}}
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb10">
        <div class="col-md-12">
            <div class="f-row">
                <label for="">Ghi chú</label>
                <textarea name="ghi_chu" v-model="benh_nhan.ghi_chu" style="resize: none" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div> 
    </div>
</div><br>
<section class="bg-x">
    <h5><b>[2] Đã tiếp nhận</b></h5>
    <div class="row" style="height: 121px;overflow: auto">
        <div class="col-md-12">
            @if (!$BenhNhan->isEmpty())
                @foreach ($BenhNhan as $k=> $item)
                    @include('frontend.item')
                @endforeach
            @else
                <div class="alert text-center" role="alert">
                    <p style="font-size:40px;color:red" class="fa fa-ban"></p>
                    <p><strong>Danh sách đang trống</strong></p>
                </div>
            @endif
        </div>
    </div>
</section>
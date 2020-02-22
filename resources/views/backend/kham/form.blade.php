<form @submit="saveKhambenh()" onsubmit="return false" action="" method="post">
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Lý do khám</label>
            <input v-model="khambenh.lydo_kham" name="ly_do"  type="text" class="form-control">
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Thị lực</label>
            <table class="table_glass">
                <tr>
                    <td rowspan="2"><p>Không kính</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.khongkinh_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p>Kính lỗ</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.kinhlo_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td>
                        <input v-model="bangkinh.khongkinh_mt" type="text" class="form-control">
                    </td>
                    <td> MT</td>
                    <td><input v-model="bangkinh.kinhlo_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Kính cũ</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.kinhcu_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p style="color: green;">Thị lực đạt được <span class="fa fa-arrow-right"></span></p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.thiluc_cu_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input v-model="bangkinh.kinhcu_mt" type="text" class="form-control"></td>
                    <td> MT</td>
                    <td><input v-model="bangkinh.thiluc_cu_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Kính mới</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.kinhmoi_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p style="color: green">Thị lực đạt được <span class="fa fa-arrow-right"></span></p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.thiluc_moi_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input v-model="bangkinh.kinhmoi_mt" type="text" class="form-control"></td>
                    <td> MT</td>
                    <td><input v-model="bangkinh.thiluc_moi_mt" type="text" class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="f-row">
            <label for=""></label>
            <table class="table_glass" style="margin-top:15px">
                <tr>
                    <td rowspan="2"><p>Nhãn áp</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.nhanap_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p>Chẩn đoán</p></td>
                    <td> MP</td>
                    <td><input v-model="bangkinh.chandoan_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input v-model="bangkinh.nhanap_mt" type="text" class="form-control"></td>
                    <td> MT</td>
                    <td><input v-model="bangkinh.chandoan_mt" type="text" class="form-control"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Chỉ định</label>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Đơn thuốc</label>
            <table class="table-donthuoc">
                <tr>
                    <th style="width: 90px">S.t</th>
                    <th style="width: 200px">Tên thuốc</th>
                    <th style="width: 75px">Số lượng</th>
                    <th style="width: 300px">Liều dùng</th>
                    <th style="width: 40px" class="text-right">+/-</th>
                </tr>
                <tr v-for="(item,index) in bangthuoc">
                    <td style="width: 90px">@{{index}}.</td>
                    <td style="width: 200px">@{{item.ten}}</td>
                    <td style="width: 75px">@{{item.so_luong}}</td>
                    <td style="width: 300px">@{{item.lieu_dung}}</td>
                    <td class="text-right" style="width: 40px">
                        <button type="button" v-on:click="removeT(index)" class="btn-del-thuoc">
                            <span class="fa fa-close"></span>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Dặn dò</label>
            <textarea v-model="khambenh.dan_do" style="resize:none" name="" id="" rows="4" class="form-control"></textarea>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Chi phí thủ thuật</label>
            <input v-model="khambenh.phi_thuthuat" @keyup="sumTien($event)" style="width: 110px" type="text" class="form-control">
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for=""></label>
            <h4><b>Tổng chỉ phí: @{{tong_chiphi}} VNĐ</b></h4>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-6"><br>
        <div class="f-row">
            <label for=""></label>
            <button type="button" v-on:click="isAdd=true" class="btn btn-primary"><span class="fa fa-plus"></span> Kê thuốc</button>
            <label style="min-width:10px !important" for=""></label>
            <button type="submit" class="btn btn-success"><span class="fa fa-print"></span> Lưu & In hóa đơn</button>
        </div>
    </div>
</div>
</form>
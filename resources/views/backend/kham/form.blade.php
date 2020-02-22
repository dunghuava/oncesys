<style>
    .input_left input{
        width: 228px;
        float: left !important;
    }
</style>
<form id="form_khambenh" onsubmit="return false" action="" method="post">
<input type="hidden" id="_token" value="{{csrf_token()}}">
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Lý do khám</label>
            <input name="ly_do"  type="text" class="form-control">
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
                    <td><input name="khongkinh_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p>Kính lỗ</p></td>
                    <td> MP</td>
                    <td><input name="kinhlo_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td>
                        <input name="khongkinh_mt" type="text" class="form-control">
                    </td>
                    <td> MT</td>
                    <td><input name="kinhlo_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Kính cũ</p></td>
                    <td> MP</td>
                    <td><input name="kinhcu_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p style="color: green;">Thị lực đạt được <span class="fa fa-arrow-right"></span></p></td>
                    <td> MP</td>
                    <td><input name="thiluc_cu_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input name="kinhcu_mt" type="text" class="form-control"></td>
                    <td> MT</td>
                    <td><input name="thiluc_cu_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Kính mới</p></td>
                    <td> MP</td>
                    <td><input name="kinhmoi_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p style="color: green">Thị lực đạt được <span class="fa fa-arrow-right"></span></p></td>
                    <td> MP</td>
                    <td><input name="thiluc_moi_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input name="kinhmoi_mt" type="text" class="form-control"></td>
                    <td> MT</td>
                    <td><input name="thiluc_moi_mt" type="text" class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="f-row">
            <label for=""></label>
            <table class="table_glass input_left" style="margin-top:15px">
                <tr>
                    <td rowspan="2" style="width: 146px"><p>Nhãn áp</p></td>
                    <td style="width: 40px"> MP</td>
                    <td><input name="nhanap_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input name="nhanap_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Chẩn đoán</p></td>
                    <td> MP</td>
                    <td><input name="chandoan_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input name="chandoan_mt" type="text" class="form-control"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Thủ thuật</label>
            <select multiple id="select_thuthuat" class="form-control" name="thu_thuat[]" id="">
                
            </select>
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
                <tbody id="list_thuoc_chon"></tbody>
            </table>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Dặn dò</label>
            <textarea name="dan_do" style="resize:none" id="" rows="4" class="form-control">Tái khám sau ... ngày / tuần</textarea>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Chi phí khám</label>
            <input id="chi_phi_kham" onkeyup="draw_options_thuoc()" style="width: 100%" type="number" min="0" class="form-control" value="0">
            <span style="margin-top: 8px;margin-left: 5px">VNĐ</span>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for=""></label>
            <h4><b>Tổng chỉ phí: <span id="tong_chiphi">0 VNĐ</span></b></h4>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-6"><br>
        <div class="f-row">
            <label for=""></label>
            <button type="button" onclick="$('#dialog_themthuoc').show()" class="btn btn-primary"><span class="fa fa-plus"></span> Kê thuốc</button>
            <label style="min-width:10px !important" for=""></label>
            <button onclick="saveKhamBenh()" type="submit" class="btn btn-success"><span class="fa fa-print"></span> Lưu & In hóa đơn</button>
        </div>
    </div>
</div>
</form>
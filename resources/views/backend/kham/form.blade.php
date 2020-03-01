
<form id="form_khambenh" onsubmit="return false" action="" method="post">
<input type="hidden" id="_token" value="{{csrf_token()}}">
@if (isset($_GET['return_id']))
    <input type="hidden" id="id_benhnhan" name="id_benhnhan" value="<?=$_GET['return_id']?>">
    <input type="hidden" id="id_khambenh" name="id_khambenh" value="<?=$khambenh['id']?>">
    <input type="hidden" id="tong_chiphi_ajax" value="<?=isset($khambenh['chi_phi']) ? $khambenh['chi_phi']:''?>">
    <script>
        $(document).ready(function () {
            db_khambenh.id_benhnhan=parseInt($('#id_benhnhan').val());
            db_khambenh.is_return=1;
        });
    </script>
@endif
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Lý do khám</label>
            <input name="ly_do"  value="{{isset($khambenh['ly_do']) ? $khambenh['ly_do']:'' }}" type="text" class="form-control">
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
                    <td><input value="{{isset($bangkinh['khongkinh_mp']) ? $bangkinh['khongkinh_mp']:''}}" name="khongkinh_mp" type="text" class="form-control"></td>
                    <td rowspan="2"><p>Kính lỗ</p></td>
                    <td> MP</td>
                    <td><input value="{{isset($bangkinh['kinhlo_mp']) ? $bangkinh['kinhlo_mp']:''}}" name="kinhlo_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td>
                        <input value="{{isset($bangkinh['khongkinh_mt']) ? $bangkinh['khongkinh_mt']:''}}" name="khongkinh_mt" type="text" class="form-control">
                    </td>
                    <td> MT</td>
                    <td><input value="{{isset($bangkinh['kinhlo_mt']) ? $bangkinh['kinhlo_mt']:''}}" name="kinhlo_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Kính cũ</p></td>
                    <td> MP</td>
                    <td class="inline form-inline">
                        <input value="{{isset($bangkinh['kinhcu_mp']) ? $bangkinh['kinhcu_mp']:''}}" style="float: left;" name="kinhcu_mp" type="text" class="form-control">
                        <input value="{{isset($bangkinh['thiluc_cu_mp']) ? $bangkinh['thiluc_cu_mp']:''}}" style="width: 100px" name="thiluc_cu_mp" type="text" class="form-control">
                    </td>
                    <td rowspan="2"><p>Kính mới</p></td>
                    <td> MP</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhmoi_mp']) ? $bangkinh['kinhmoi_mp']:''}}" style="float: left;" name="kinhmoi_mp" type="text" class="form-control">
                        <input value="{{isset($bangkinh['thiluc_moi_mp']) ? $bangkinh['thiluc_moi_mp']:''}}" style="width: 100px" name="thiluc_moi_mp" type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhcu_mt']) ? $bangkinh['kinhcu_mt']:''}}" style="float: left;" name="kinhcu_mt" type="text" class="form-control">
                        <input value="{{isset($bangkinh['thiluc_cu_mt']) ? $bangkinh['thiluc_cu_mt']:''}}" style="width: 100px" name="thiluc_cu_mt" type="text" class="form-control">
                    </td>
                    <td> MT</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhmoi_mt']) ? $bangkinh['kinhmoi_mt']:''}}" style="float: left;" name="kinhmoi_mt" type="text" class="form-control">
                        <input value="{{isset($bangkinh['thiluc_moi_mt']) ? $bangkinh['thiluc_moi_mt']:''}}" style="width: 100px" name="thiluc_moi_mt" type="text" class="form-control">
                    </td>
                </tr>
            </table>
        </div>
        <div class="f-row">
            <label for=""></label>
            <table class="table_glass input_left" style="margin-top:15px">
                <tr>
                    <td rowspan="2" style="width: 100px"><p>Nhãn áp</p></td>
                    <td style="width: 30px"> MP</td>
                    <td><input value="{{isset($bangkinh['nhanap_mp']) ? $bangkinh['nhanap_mp']:''}}" name="nhanap_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input value="{{isset($bangkinh['nhanap_mt']) ? $bangkinh['nhanap_mt']:''}}" name="nhanap_mt" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td rowspan="2"><p>Chẩn đoán</p></td>
                    <td> MP</td>
                    <td><input value="{{isset($bangkinh['chandoan_mp']) ? $bangkinh['chandoan_mp']:''}}"  name="chandoan_mp" type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td><input value="{{isset($bangkinh['chandoan_mt']) ? $bangkinh['chandoan_mt']:''}}" name="chandoan_mt" type="text" class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="f-row">
            <label for="">
            </label>
            <table class="table_glass" style="margin-top: 15px">
                <tr>
                    <td rowspan="2"><p>Kính lão</p></td>
                    <td> MP</td>
                    <td class="inline form-inline">
                        <input value="{{isset($bangkinh['kinhlao_mp']) ? $bangkinh['kinhlao_mp']:''}}" style="float: left;" name="kinhlao_mp" type="text" class="form-control">
                        <input value="{{isset($bangkinh['dongtulao_mp']) ? $bangkinh['dongtulao_mp']:''}}" style="width: 100px" name="dongtulao_mp" type="text" class="form-control">
                    </td>
                    <td rowspan="2"><p>Kính nhìn xa</p></td>
                    <td> MP</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhnhinxa_mp']) ? $bangkinh['kinhnhinxa_mp']:''}}" style="float: left;" name="kinhnhinxa_mp" type="text" class="form-control">
                        <input value="{{isset($bangkinh['dongtuxa_mp']) ? $bangkinh['dongtuxa_mp']:''}}" style="width: 100px" name="dongtuxa_mp" type="text" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td> MT</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhlao_mt']) ? $bangkinh['kinhlao_mt']:''}}"  style="float: left;" name="kinhlao_mt" type="text" class="form-control">
                        <input value="{{isset($bangkinh['dongtulao_mt']) ? $bangkinh['dongtulao_mt']:''}}" style="width: 100px" name="dongtulao_mt" type="text" class="form-control">
                    </td>
                    <td> MT</td>
                    <td class="form-inline">
                        <input value="{{isset($bangkinh['kinhnhinxa_mt']) ? $bangkinh['kinhnhinxa_mt']:''}}" style="float: left;" name="kinhnhinxa_mt" type="text" class="form-control">
                        <input value="{{isset($bangkinh['dongtuxa_mt']) ? $bangkinh['dongtuxa_mt']:''}}" style="width: 100px" name="dongtuxa_mt" type="text" class="form-control">
                    </td>
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
                <?php if (isset($khambenh['thu_thuat'])){  
                    $options = explode(',',$khambenh['thu_thuat']);
                    foreach ($options as $item){
                        echo '<option selected>'.$item.'</option>';
                    }
                }?>
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
                    <th style="width: 90px">STT</th>
                    <th style="width: 200px">Tên thuốc</th>
                    <th style="width: 75px">Số lượng</th>
                    <th style="width: 300px">Liều dùng</th>
                    <th style="width: 40px" class="text-right">+/-</th>
                </tr>
                <tbody id="list_thuoc_chon">
                    <tr><td class="text-center" colspan="5">--- danh sách trống ---</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Dặn dò</label>
            <textarea name="dan_do" style="resize:none" id="" rows="4" class="form-control"><?=isset($khambenh['dan_do']) ? $khambenh['dan_do']:'Tái khám sau ... ngày / tuần'?></textarea>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for="">Chi phí khám</label>
            <input  id="chi_phi_kham" onkeyup="draw_options_thuoc()" style="width: 100%" type="number" min="0" class="form-control" value="">
            <span style="margin-top: 8px;margin-left: 5px">VNĐ</span>
        </div>
        <p style="margin:10px 0px 0px 70px">(*) Bao gồm cả chi phí thủ thuật</p>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-12">
        <div class="f-row">
            <label for=""></label>
            <h4><b>Tổng chỉ phí: <span id="tong_chiphi"><?=isset($khambenh['chi_phi']) ? number_format($khambenh['chi_phi']):0?> VNĐ</span></b></h4>
        </div>
    </div>
</div>
<div class="row mb10">
    <div class="col-md-6"><br>
        <div class="f-row">
            <label for=""></label>
            <button type="button" onclick="$('#dialog_themthuoc').show();getALlThuoc()" class="btn btn-primary"><span class="fa fa-plus"></span> Kê thuốc</button>
            <label style="min-width:10px !important" for=""></label>
            <button onclick="saveKhamBenh()" type="submit" class="btn btn-success"><span class="fa fa-print"></span> Lưu & In hóa đơn</button>
            <label style="min-width:10px !important" for=""></label>
            <button onclick="saveDonKinh()" type="button" class="btn btn-warning"><span class="fa fa-sign-out"></span> Xuất đơn kính</button>
        </div>
    </div>
</div>
</form>

<script>
    $(document).ready(function () {
        $('input').prop('autocomplete','off')
    });
</script>
<?php if(isset($_GET['return_id'])){ ?>
<script>
    $(document).ready(function () {
        console.log('return manager is ready ...');
        $.ajax({
            type: "get",
            url: "api/b/get-return-ds-thuoc/"+$('#id_khambenh').val(),
            success: function (response) {
                db_bangthuoc=response.ds_thuoc;
                var all_thuoc=0;
                $.each(db_bangthuoc, function (i, item) { 
                    all_thuoc+=parseInt(item.gia*item.so_luong);
                });
                var tong = $('#tong_chiphi_ajax').val();
                $('#chi_phi_kham').val(parseInt(tong-all_thuoc));
                draw_options_thuoc();
            }
        });
    });
</script>
<?php } ?>
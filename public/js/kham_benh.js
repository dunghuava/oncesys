$(document).ready(function () {
    $('select').select2();
    $('#select_thuthuat').select2({
        tags: true
    })
    API_CALL_BACK();
});
var arr_thuoc = [];
var db_khambenh = { id_benhnhan: 0, chi_phi: 0, is_return: 0 };
var db_bangthuoc = [];
var db_bangkinh = {};
var _token = $('#_token').val();

function number_format(amount, decimalCount = 0, decimal = ".", thousands = ",") {
    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = amount < 0 ? "-" : "";

        let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;

        return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
        console.log(e)
    }
};
function API_CALL_BACK() {
    getALlThuoc();
}
function getALlThuoc() {
    $.ajax({
        type: "get",
        url: "api/b/get-all-thuoc",
        success: function (response) {
            var options = '';
            arr_thuoc = response;
            $.each(response, function (i, item) {
                options += '<option value="' + item.id + '">' + item.ten + '</option>';
            });
            $('#select_thuoc').html(options);
        }
    });

}

function addDSThuoc() {
    var id_thuoc = $('#select_thuoc').val();
    var find_item = arr_thuoc.find(item => item.id == id_thuoc)

    var item = {
        id_thuoc: id_thuoc,
        ten: find_item.ten,
        so_luong: $('#soluong_thuoc').val(),
        gia: find_item.gia_ban,
        gia_von: find_item.gia_von,
        loai: find_item.loai,
        lieu_dung: $('#cachdung_thuoc').val()
    }
    db_bangthuoc.push(item);
    draw_options_thuoc();
    return false;
}

function draw_options_thuoc() {
    var options = '';
    db_khambenh.chi_phi = 0;
    $.each(db_bangthuoc, function (i, item) {
        options += '<tr>';
        options += '<td>' + (++i) + '</td>';
        options += '<td>' + item.ten + '</td>';
        options += '<td>' + item.so_luong + '</td>';
        options += '<td>' + item.lieu_dung + '</td>';
        options += '<td><button onclick="remove_thuoc(' + (i) + ')" type="button" class="btn-del-thuoc"><span class="fa fa-close"></span></button></td>';
        options += '</tr>';
        db_khambenh.chi_phi += (item.gia * item.so_luong);
    });
    db_khambenh.chi_phi += parseInt($('#chi_phi_kham').val() == '' ? 0 : $('#chi_phi_kham').val());
    $('#tong_chiphi').html(number_format(db_khambenh.chi_phi) + ' VNĐ')
    $('#list_thuoc_chon').html(options);
}
function remove_thuoc(i) {
    --i;
    db_bangthuoc.splice(i, 1);
    draw_options_thuoc();
}
function getBenhNhanID(id) {
    $.ajax({
        type: "get",
        url: "api/b/get-benh-nhan-id/" + id,
        success: function (response) {
            response = response[0];
            db_khambenh.id_benhnhan = response.id;
            var sex = response.gioi_tinh == 0 ? 'Nam' : 'Nữ';
            $('#thong_tin').html(response.ho_ten + ' / ' + response.tuoi + ' tuổi (' + sex + ')');
            $('#dien_thoai').html(response.dien_thoai);
            $('#dia_chi').html(response.ward + ', ' + response.district + ', ' + response.province);
        }
    });
}
function saveKhamBenh() {
    var form = $('#form_khambenh');
    if (db_khambenh.id_benhnhan == 0) {
        setMessage('Thông báo', 'Chưa chỉ định bệnh nhân được khám');
        return 0;
    }
    db_khambenh.ly_do = form.find("[name='ly_do']").val();
    db_bangkinh.khongkinh_mp = form.find("[name='khongkinh_mp']").val();
    db_bangkinh.khongkinh_mt = form.find("[name='khongkinh_mt']").val();
    db_bangkinh.kinhlo_mp = form.find("[name='kinhlo_mp']").val();
    db_bangkinh.kinhlo_mt = form.find("[name='kinhlo_mt']").val();
    db_bangkinh.kinhcu_mp = form.find("[name='kinhcu_mp']").val();
    db_bangkinh.kinhcu_mt = form.find("[name='kinhcu_mt']").val();
    db_bangkinh.thiluc_cu_mp = form.find("[name='thiluc_cu_mp']").val();
    db_bangkinh.thiluc_cu_mt = form.find("[name='thiluc_cu_mt']").val();
    db_bangkinh.kinhmoi_mp = form.find("[name='kinhmoi_mp']").val();
    db_bangkinh.kinhmoi_mt = form.find("[name='kinhmoi_mt']").val();
    db_bangkinh.thiluc_moi_mp = form.find("[name='thiluc_moi_mp']").val();
    db_bangkinh.thiluc_moi_mt = form.find("[name='thiluc_moi_mt']").val();
    db_bangkinh.nhanap_mp = form.find("[name='nhanap_mp']").val();
    db_bangkinh.nhanap_mt = form.find("[name='nhanap_mt']").val();
    db_bangkinh.chandoan_mp = form.find("[name='chandoan_mp']").val();
    db_bangkinh.chandoan_mt = form.find("[name='chandoan_mt']").val();
    db_khambenh.print_type = 0;

    db_khambenh.dan_do = form.find("[name='dan_do']").val();
    db_khambenh.thu_thuat = $('#select_thuthuat').val();
    db_khambenh.thu_thuat = db_khambenh.thu_thuat == null ? [''] : db_khambenh.thu_thuat;
    db_khambenh.thu_thuat = db_khambenh.thu_thuat.join();


    //
    $.confirm({
        title: 'Xác nhận',
        content: 'Lưu thông tin và xuất hóa đơn ?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Đồng ý',
                action: function () {
                    lazyload();
                    $.ajax({
                        type: "post",
                        url: "api/b/save-kham-benh",
                        data: { 'khambenh': db_khambenh, 'bangkinh': db_bangkinh, 'bangthuoc': db_bangthuoc, '_token': _token },
                        success: function (response) {
                            console.log(response);
                            setMessage('Thông báo', 'Lưu dữ liệu thành công');
                            setTimeout(() => {
                                location.href = 'b/printer?s_id=' + response.id;
                            }, 1500);
                        },
                        error: function () {
                            setMessage('Lỗi', 'Lưu dữ liệu không thành công')
                        }
                    });
                }
            },
            cancelAction: function () {
            }
        }
    });
    //
}

function saveDonKinh() {
    var form = $('#form_khambenh');
    if (db_khambenh.id_benhnhan == 0) {
        setMessage('Thông báo', 'Chưa chỉ định bệnh nhân được khám');
        return 0;
    }
    db_khambenh.ly_do = form.find("[name='ly_do']").val();
    db_bangkinh.khongkinh_mp = form.find("[name='khongkinh_mp']").val();
    db_bangkinh.khongkinh_mt = form.find("[name='khongkinh_mt']").val();
    db_bangkinh.kinhlo_mp = form.find("[name='kinhlo_mp']").val();
    db_bangkinh.kinhlo_mt = form.find("[name='kinhlo_mt']").val();
    db_bangkinh.kinhcu_mp = form.find("[name='kinhcu_mp']").val();
    db_bangkinh.kinhcu_mt = form.find("[name='kinhcu_mt']").val();
    db_bangkinh.thiluc_cu_mp = form.find("[name='thiluc_cu_mp']").val();
    db_bangkinh.thiluc_cu_mt = form.find("[name='thiluc_cu_mt']").val();
    db_bangkinh.kinhmoi_mp = form.find("[name='kinhmoi_mp']").val();
    db_bangkinh.kinhmoi_mt = form.find("[name='kinhmoi_mt']").val();
    db_bangkinh.thiluc_moi_mp = form.find("[name='thiluc_moi_mp']").val();
    db_bangkinh.thiluc_moi_mt = form.find("[name='thiluc_moi_mt']").val();
    db_bangkinh.nhanap_mp = form.find("[name='nhanap_mp']").val();
    db_bangkinh.nhanap_mt = form.find("[name='nhanap_mt']").val();
    db_bangkinh.chandoan_mp = form.find("[name='chandoan_mp']").val();
    db_bangkinh.chandoan_mt = form.find("[name='chandoan_mt']").val();
    //
    db_bangkinh.kinhlao_mp = form.find("[name='kinhlao_mp']").val();
    db_bangkinh.dongtulao_mp = form.find("[name='dongtulao_mp']").val();
    db_bangkinh.kinhlao_mt = form.find("[name='kinhlao_mt']").val();
    db_bangkinh.dongtulao_mt = form.find("[name='dongtulao_mt']").val();
    db_bangkinh.kinhnhinxa_mp = form.find("[name='kinhnhinxa_mp']").val();
    db_bangkinh.dongtuxa_mp = form.find("[name='dongtuxa_mp']").val();
    db_bangkinh.kinhnhinxa_mt = form.find("[name='kinhnhinxa_mt']").val();
    db_bangkinh.dongtuxa_mt = form.find("[name='dongtuxa_mt']").val();
    db_khambenh.print_type = 1;

    //
    $.confirm({
        title: 'Xác nhận',
        content: 'Lưu thông tin và xuất hóa đơn ?',
        autoClose: 'cancelAction|8000',
        buttons: {
            deleteUser: {
                text: 'Đồng ý',
                action: function () {
                    lazyload();
                    $.ajax({
                        type: "post",
                        url: "api/b/save-kham-benh",
                        data: { 'khambenh': db_khambenh, 'bangkinh': db_bangkinh, '_token': _token },
                        success: function (response) {
                            console.log(response);
                            setMessage('Thông báo', 'Lưu dữ liệu thành công');
                            setTimeout(() => {
                                location.href = 'b/printer?s_id=' + response.id;
                            }, 1500);
                        },
                        error: function () {
                            setMessage('Lỗi', 'Lưu dữ liệu không thành công')
                        }
                    });
                }
            },
            cancelAction: function () {
            }
        }
    });
    //

}

<?php 
    use App\http\Controllers\backendController;
    $ctrler = new backendController();
    $benhnhan=$ctrler->getBenhNhanId2($_GET['target']);
    $khambenh=$ctrler->getKhamBenh($benhnhan['id']); 
    $bangthuoc=$ctrler->getBangThuoc($khambenh['id']);
    $bangkinh=$ctrler->getBangKinh($khambenh['id']);
?>

<style>
    .p15{padding: 15px}
    .center{text-align: center}
    .right{text-align: right}
    .bold{font-weight: bold}
    .auto{margin: auto;}
    #PAGE-A5{
        width: 14.8cm;
        height: 21cm;
        margin: auto;
        background: white;
        /* box-shadow: 0 0 0.2cm rgba(0,0,0,0.2); */
        cursor: pointer;
    }
</style>
<style>
    @media print{
        @page {
            size: A5;
            margin: 0;
        }
    }
    #logo{
        width: 111px;
    }
    #print_table td{padding:0px 0px;font-size: 14px}
    .table-kq td{text-align: center}

</style>
<div class="p15" id="PAGE-A5">
    <table id="print_table" style="width: 100%">
        <tr>
            <td colspan="6" style="width: 222px">
                <img id="logo" src="public/images/logo_print.png" alt="">
                <p>Điện thoại: 0383868205</p>
                <p>Địa chỉ: F22, Bình Thạnh , HCM</p>
            </td>
            <td colspan="4" class="center">
                <h2 class="bold">KẾT QUẢ KHÁM</h2>
                <p>-----oOo-----</p>
            </td>
        </tr>
        <tr>
            <td><p>Họ và tên:</p></td>
            <td colspan="6"><p><b>{{$benhnhan['ho_ten']}}</b></p></td>
            <td><p>Tuổi:</p></td>
            <td><p>{{$benhnhan['tuoi']}}</p></td>
            <td colspan="4"><p>Giới tính: {{$benhnhan['gioi_tinh']==0 ? 'Nam':'Nữ'}}</p></td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td colspan="8">{{$benhnhan['ward'].', '.$benhnhan['district'].', '.$benhnhan['province']}}</td>
            <td colspan="2">SĐT: {{$benhnhan['dien_thoai']}}<p></p></td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1" style="width:100%" class="table-kq">
                    <tr>
                        <td>/</td>
                        <td>Không kính</td>
                        <td>Kính lỗ</td>
                        <td>Kính cũ</td>
                        <td>Kính mới</td>
                        <td>Nhãn áp</td>
                    </tr>
                    <tr>
                        <td><b>MP</b></td>
                        <td>{{$bangkinh['khongkinh_mp']}}</td>
                        <td>{{$bangkinh['kinhlo_mp']}}</td>
                        <td>{{$bangkinh['kinhcu_mp']}}</td>
                        <td>{{$bangkinh['kinhmoi_mp']}}</td>
                        <td>{{$bangkinh['nhanap_mp']}}</td>
                    </tr>
                    <tr>
                        <td><b>MT</b></td>
                        <td>{{$bangkinh['khongkinh_mt']}}</td>
                        <td>{{$bangkinh['kinhlo_mt']}}</td>
                        <td>{{$bangkinh['kinhcu_mt']}}</td>
                        <td>{{$bangkinh['kinhmoi_mt']}}</td>
                        <td>{{$bangkinh['nhanap_mt']}}</td>
                    </tr>
                </table><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Chẩn đoán:</p>
            </td>
            <td colspan="5"><p><b>MP</b>: {{$bangkinh['chandoan_mp']}}</p></td>
            <td colspan="4"><p><b>MT</b>: {{$bangkinh['chandoan_mt']}}</p></td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Thủ thuật:</p>
            </td>
            <td colspan="8">
                <p>Đánh bờ mi, Đánh bờ mi, Đánh bờ mi, Đánh bờ mi, Đánh bờ mi, Đánh bờ mi, Đánh bờ mi,</p>
            </td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1px" style="width: 100%" class="table-kq">
                    <tr>
                        <td>STT</td>
                        <td>Tên thuốc</td>
                        <td>Số lượng</td>
                        <td>Đơn vị</td>
                        <td>Liều dùng</td>
                    </tr>
                    @foreach ($bangthuoc as $k => $item)
                        <tr>
                            <td>{{++$k}}</td>
                            <td>{{$item['ten']}}</td>
                            <td>{{$item['so_luong']}}</td>
                            <td>{{$item['loai']}}</td>
                            <td>{{$item['lieu_dung']}}</td>
                        </tr>
                    @endforeach                      
                </table><br>
            </td>
        </tr>
        <tr>
            <td><p>Dặn dò: </p></td>
            <td colspan="9">
                <p>{{$khambenh['dan_do']}}</p>
                <p>(*) Khi khám lại nhớ mang theo phiếu này</p>
            </td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="4" class="center">
                <p>.....Ngày ....Tháng .....Năm ....</p>
                <br><br>
                <h4 align="center">BS. LÊ PHI HOÀNG</h4>
            </td>
        </tr>
    </table>
</div>
<br><br><br><br>
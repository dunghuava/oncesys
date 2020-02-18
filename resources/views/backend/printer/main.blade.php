<style>
    .p15{padding: 15px}
    .center{text-align: center}
    .right{text-align: right}
    .cols-1 {width: 8.33%;}
    .cols-2 {width: 16.66%;}
    .cols-3 {width: 25%;}
    .cols-4 {width: 33.33%;}
    .cols-5 {width: 41.66%;}
    .cols-6 {width: 50%;}
    .cols-7 {width: 58.33%;}
    .cols-8 {width: 66.66%;}
    .cols-9 {width: 75%;}
    .cols-10 {width: 83.33%;}
    .cols-11 {width: 91.66%;}
    .cols-12 {width: 100%;}
    .clear{clear: both}
    [class*="cols-"] {
        float: left;
        clear: both;
        margin-bottom: 15px;
    }
    .bold{font-weight: bold}
    .auto{margin: auto;}
    #PAGE-A5{
        width: 14.8cm;
        height: 21cm;
        margin: auto;
        background: white;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.2);
    }
</style>
<style>
    @media print{
        @page {
            size: a5;
            margin: 0;
        }
    }
    #logo{
        width: 120px;
    }
    #print_table td{padding:0px 0px;font-size: 14px}
    .table-kq td{text-align: center}

</style>
<div class="p15" id="PAGE-A5">
    <table id="print_table" style="width: 100%">
        <tr>
            <td colspan="10">
                <img id="logo" src="public/images/logo.png" alt="">
                <h5>PHÒNG KHÁM MẮT BẢO AN</h5>
                <p>Địa chỉ: 123 Đống Đa , Hà Nội</p>
            </td>
        </tr>
        <tr>
            <td colspan="10" class="center">
                <h3 class="bold">KẾT QUẢ KHÁM</h3>
                <p>-----oOo-----</p>
            </td>
        </tr>
        <tr>
            <td><p>Họ và tên:</p></td>
            <td colspan="5"><p><b>Hứa Văn Dũng</b></p></td>
            <td><p>Tuổi: 24 tuổi</p></td>
            <td><p>Giới tính: Nam</p></td>
        </tr>
        <tr>
            <td><p>Địa chỉ:</p></td>
            <td colspan="9"><p>Thôn 10, Xã Đak N'Drot , Huyện Đăk Mill, Tỉnh Đăk Nông</p></td>
        </tr>
        <tr>
            <td colspan="10"><p>Thị lực.</p></td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1" style="width:100%" class="table-kq">
                    <tr>
                        <td rowspan="2"><p>Ko.kính</p></td>
                        <td><p>MP</p></td>
                        <td>1.1</td>
                        <td rowspan="2"><p>Kính lỗ</p></td>
                        <td><p>MP</p></td>
                        <td>1.2</td>
                        <td rowspan="2"><p>Kính cũ</p></td>
                        <td><p>MP</p></td>
                        <td>1.3</td>
                        <td rowspan="2"><p>Kính mới</p></td>
                        <td><p>MP</p></td>
                        <td>1.4</td>
                        <td rowspan="2"><p>Nhãn áp</p></td>
                        <td><p>MP</p></td>
                        <td>1.5</td>
                    </tr>
                    <tr>
                        <td><p>MT</p></td>
                        <td><p>1.1</p></td>
                        <td><p>MT</p></td>
                        <td><p>1.2</p></td>
                        <td><p>MT</p></td>
                        <td><p>1.3</p></td>
                        <td><p>MT</p></td>
                        <td><p>1.4</p></td>
                        <td><p>MT</p></td>
                        <td><p>1.5</p></td>
                    </tr>
                </table><br>
            </td>
        </tr>
        <tr>
            <td colspan="10"><p>Đơn thuốc</p></td>
        </tr>
        <tr>
            <td colspan="10">
                <table border="1px" style="width: 100%" class="table-kq">
                    <tr>
                        <td>S.t</td>
                        <td>Tên thuốc</td>
                        <td>Số lượng</td>
                        <td>Loại</td>
                        <td>Liều dùng</td>
                    </tr>
                    @for ($i = 0; $i < 6; $i++)                        
                    <tr>
                        <td>1.</td>
                        <td>Vitamin C</td>
                        <td>2</td>
                        <td>Viên</td>
                        <td>Uống 2 lần 1 ngày</td>
                    </tr>
                    @endfor

                </table><br>
            </td>
        </tr>
        <tr>
            <td><p>Dặn dò: </p></td>
            <td colspan="9"><p>Lưu ý uống thuốc đúng giờ , tái khám sau 1 tuần</p></td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td colspan="4" class="center">
                <p>.............Ngày ..........Tháng ..........Năm ...........</p>
                <br><br>
                <h4>BS. LÊ PHI HOÀNG</h4>
            </td>
        </tr>
    </table>
</div>
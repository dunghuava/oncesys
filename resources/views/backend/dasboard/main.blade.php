<div class="row bg-w mb15">
    <div class="col-md-12"><br>
        <h4 class="m0"><b>Doanh thu hôm nay</b></h4>
    </div>
    <div class="col-md-3">
        <h2 style="background: green" class="circle_div fa fa-usd"></h2>
        <span>Khám bệnh</span>
        <h3 class="m0"><b>Tổng: {{number_format($total['total'])}} VNĐ</b></h3>
        <p></p>
    </div>
    <div class="col-md-3">
        <h2 class="circle_div fa fa-reply-all bg-primary"></h2>
        <span>Hàng hóa</span>
    </div>
</div>

{{-- part 1 --}}
<div class="row bg-w mb15" style="display: none">
        <div class="p10">
            <h2 class="circle_div fa fa-reply-all bg-primary m0"></h2>
            <span>Thuốc sử dụng trong ngày</span>
        </div>
        <div class="p10">
            <table border="1px" style="width: 100%;border:1px solid #ccc">
                <tr>
                    <th style="width: 40px">S.t</th>
                    <th>Tên thuốc</th>
                    <th>Loại</th>
                    <th style="width: 100px">Đã sử dụng</th>
                    <th style="width: 150px">Ngày / Giờ</th>
                </tr>
                @if (!$data_thuoc->isEmpty())
                @foreach ($data_thuoc as $k =>$item)
                    <tr class="new_tr">
                        <td style="width: 40px">{{$k+1}}</td>
                        <td>{{$item['ten']}}</td>
                        <td>{{$item['ten_loai']}}</td>
                        <td style="width: 150px">{{$item['so_luong']}}</td>
                        <td style="width: 150px">{{$item['created_at']}}</td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">
                            <i>---chưa có dữ liệu---</i>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
</div>
{{-- part 2 --}}
<hr>
<div class="row bg-w mb15">
        <div class="p10">
            <h2 class="circle_div fa fa-reply-all bg-primary m0"></h2>
            <span>Bệnh nhân khám trong ngày</span>
        </div>
        <div class="p10">
            <table border="1px" style="width: 100%;border:1px solid #ccc">
                <tr>
                    <th style="width: 40px">S.t</th>
                    <th>Họ và tên</th>
                    <th>Địa chỉ</th>
                    <th>Ngày sinh</th>
                    <th>Điện thoại</th>
                    <th style="width: 150px">Ngày / giờ</th>
                </tr>
                @if (!$data->isEmpty())
                @foreach ($data as $k =>$item)
                    <tr class="new_tr">
                        <td style="width: 40px">{{$k+1}}</td>
                        <td>{{$item['ho_ten']}}</td>
                        <td>{{$item['ward'].', '.$item['district'].', '.$item['province']}}</td>
                        <td>{{$item['ngay_sinh']}}</td>
                        <td>{{$item['dien_thoai']}}</td>
                        <td style="width: 150px">{{$item['updated_at']}}</td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">
                            <i>---chưa có dữ liệu---</i>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
</div>


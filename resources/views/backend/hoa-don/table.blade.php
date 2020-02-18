<?php 
    use App\http\Controllers\backendController;
    $be_controller = new backendController();
?>
@if (isset($mess))
    <h5 style="margin-top: 0px;"><b>{{$mess}}</b></h5>
@endif
<div class="box bg-w">
    <table style="width: 100%" class="m-table">
        <thead>
            <tr>
                <th class="w50">
                    <div class="ckbox">
                        <input type="checkbox" id="checkbox4" checked>
                        <label for="checkbox4"></label>
                    </div>
                </th>
                <th class="w100">Mã BN</th>
                <th>Họ tên</th>
                <th class="w100"><span class="fa fa-calendar"></span> Ngày sinh</th>
                <th class="w100">Tuổi</th>
                <th class="w100"><span class="fa fa-phone"></span> Điện thoại</th>
                <th class="w100"><span class="fa fa-calendar"></span> Ngày khám</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
            <tr data-toggle="{{$i!=0 ? 'collapse':''}}" data-target="#tr_{{$i}}">
                    <td class="w50">
                        <div class="ckbox">
                            <input type="checkbox" name="cko">
                            <label for="checkbox4"></label>
                        </div> 
                    </td>
                    <td class="w100">{{$item->ma_bn}}</td>
                    <td>{{$item->ho_ten}}</td>
                    <td>{{$item->ngay_sinh}}</td>
                    <td class="w100">{{$item->tuoi}}</td>
                    <td class="w100">{{$item->dien_thoai}}</td>
                    <td class="w80 text-center"><b>{{$item->created_at}}</b></td>
            </tr>
            <tr id="tr_{{$i}}" class="collapse {{$i==0 ? 'in':''}}" style="background: white !important">
                <td colspan="2" class="text-center">
                    <p>
                        <img style="width:100px" src="public/images/no-img.png" alt="">
                    </p>
                </td>
                <td colspan="5">
                    <?php 
                        $khambenh = $be_controller::getKhamBenh($item['id']);
                        $bangkinh = $be_controller::getBangKinh($khambenh['id']);
                        $bangthuoc = $be_controller::getBangThuoc($khambenh['id']);
                    ?>
                    <p class="p-horizon">
                        <b>Địa chỉ: </b> {{$item->ward.', '.$item->district.', '.$item->province}}
                        <b>Lý do khám: </b>{{$khambenh['lydo_kham']}}
                        <b>Chỉ định: </b>{{$khambenh['chi_dinh']}}
                        <b>Chi phí: </b>{{number_format($khambenh['chi_phi'])}} VNĐ
                    </p>
                    <p> <br>
                        
                        <table border="1px" style="border-collapse: separate">
                            <tr>
                                <td rowspan="2">Không kính</td>
                                <td>MP</td>
                                <td>{{$bangkinh['khongkinh_mp']}}</td>
                                <td rowspan="2">Kính lỗ</td>
                                <td>MP</td>
                                <td>{{$bangkinh['kinhlo_mp']}}</td>

                                <td rowspan="2">Kính cũ</td>
                                <td>MP</td>
                                <td>{{$bangkinh['kinhcu_mp']}}</td>
                                <td rowspan="2">Kính mới</td>
                                <td>MP</td>
                                <td>{{$bangkinh['kinhmoi_mp']}}</td>

                                <td rowspan="2">Nhãn áp</td>
                                <td>MP</td>
                                <td>{{$bangkinh['nhanap_mp']}}</td>
                                <td rowspan="2">Chẩn đoán</td>
                                <td>MP</td>
                                <td>{{$bangkinh['chandoan_mp']}}</td>

                            </tr>
                            <tr>
                                <td>MT</td>
                                <td>{{$bangkinh['khongkinh_mt']}}</td>
                                <td>MT</td>
                                <td>{{$bangkinh['kinhlo_mt']}}</td>

                                <td>MT</td>
                                <td>{{$bangkinh['kinhcu_mt']}}</td>
                                <td>MT</td>
                                <td>{{$bangkinh['kinhmoi_mt']}}</td>

                                <td>MT</td>
                                <td>{{$bangkinh['nhanap_mt']}}</td>
                                <td>MT</td>
                                <td>{{$bangkinh['chandoan_mt']}}</td>
                            </tr>
                        </table>
                        <br>
                        <table border="1px" style="border-collapse: separate">
                            <tr>
                                <td>S.t</td>
                                <td>Tên thuốc</td>
                                <td>Số lượng</td>
                                <td>Liều dùng</td>
                            </tr>
                            @if (!$bangthuoc->isEmpty()) 
                                @foreach ($bangthuoc as $k =>$thuoc)    
                                <tr>
                                    <td>{{$k+1}}.</td>
                                    <td>{{$thuoc['ten']}}</td>
                                    <td>{{$thuoc['so_luong']}}</td>
                                    <td>{{$thuoc['lieu_dung']}}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center"><i>chưa có dữ liệu</i></td>
                                </tr>
                            @endif
                        </table>
                    </p>
                    <p class="text-left">
                        <a href="{{asset('b/printer/?target=').$item['id']}}">
                            <button class="btn btn-primary">
                                <span class="fa fa-save"></span>
                                In hóa đơn
                            </button>
                        </a>
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="page">
    {{$data->links()}}
</div>
@if (isset($mess))
    <h5><b>{{$mess}}</b></h5>
@endif

<div class="box bg-w">
    <input type="hidden" id="next_index" next-index="{{count($data)}}">
    <table style="width: 100%" class="m-table">
        <thead>
            <tr>
                <th class="w50">
                    <div class="ckbox">
                        <input type="checkbox" id="checkbox4" checked>
                        <label for="checkbox4"></label>
                    </div>
                </th>
                <th class="w100">Mã kính</th>
                <th>Tên kính</th>
                <th class="w100">Loại</th>
                <th class="w100">Giá bán</th>
                <th class="w100">Giá vốn</th>
                <th class="w80">Tồn kho</th>
            </tr>
        </thead>
        <tbody>
            @if(!$data->isEmpty())
            @foreach ($data as $i => $item)
            <tr data-toggle="{{$i!=0 ? 'collapse':'collapse'}}" data-target="#tr_{{$i}}">
                    <td class="w50">
                        <div class="ckbox">
                            <input type="checkbox" name="cko">
                            <label for="checkbox4"></label>
                        </div> 
                    </td>
                    <td class="w100">{{$item->ma}}</td>
                    <td>{{$item->ten}}</td>
                    <td>{{$item->ten_loai}}</td>
                    <td class="w100">{{number_format($item->gia_ban)}}</td>
                    <td class="w100">{{number_format($item->gia_von)}}</td>
                    <td class="w80"><b>{{number_format($item->so_luong)}}</b></td>
            </tr>
            <tr id="tr_{{$i}}" class="collapse {{$i==0 ? '':''}}">
                <td colspan="2" class="text-center">
                    <p>
                        <img style="width:100px" src="public/images/no-img.png" alt="">
                    </p>
                </td>
                <td colspan="5">
                    <p><b>Thông tin:</b></p>
                    <p>
                        {{$item->chi_tiet}}
                    </p>
                    <p><b>NSX:</b> {{$item->ngay_sx}} | <b>HSD:</b> {{$item->han_sd}}</p>
                    <p class="text-right">
                        <button v-on:click="isAdd=true;id={{$item->id}};isUpdate=true;getUpdateKinh()" class="btn btn-success">Cập nhật</button>
                        <button v-on:click="isDelete=true;id={{$item->id}}" class="btn btn-danger">
                            <span class="fa fa-trash"></span> Xóa
                        </button>
                    </p>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">
                    <img style="width: 150px" src="public/images/empty.png" alt="">
                </td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
<div class="page">
    {{$data->links()}}
</div>
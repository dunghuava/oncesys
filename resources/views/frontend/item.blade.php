<div class="user-item row" style="width: 50%;float: left">
    <div class="col-md-3 text-center">
        <img src="public/images/user.png" alt="">
        <p><b>{{$item->ho_ten}}</b></p>
    </div>
    <div class="col-md-9">
        <p><b>Tuổi:</b> {{$item->ho_ten}}</p>
        <p><b>Địa chỉ:</b> {{$item->dia_chi}} | {{$item->ward.', '.$item->district.', '.$item->province}}</p>
        <p><b>Điện thoại:</b> {{$item->dien_thoai}}</p>
        <span style="position:absolute;top:4px;right:10px;" v-on:click="isdelete=true;id={{$item->id}}" class="fa fa-trash"></span>
    </div>
</div>
<br><br><br>
<div class="row p0 m0">
    <div class="col-md-12 p0"><br>
        <div class="bg-wx scroll-able">
            @foreach ($BenhNhan as $item)
                <div v-on:click="id={{$item->id}};getBenhNhanID()" class="item-user-left bg-x mb10">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="public/images/user.png" alt="">
                        </div>
                        <div class="col-md-9 text-left">
                            <h4 class="name">{{$item->ho_ten}}</h4>
                            <p>MÃ: <b>{{$item->ma_bn}}</b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
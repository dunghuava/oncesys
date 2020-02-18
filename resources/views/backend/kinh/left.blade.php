<div class="row p0 m0">
    <div class="col-md-12">
        <div class="sibar">
            <div class="option form-inline">
                <form action="{{asset('b/glass/search')}}" method="get">
                    @csrf
                    <p class="option-name">Tìm kiếm</p>
                    <input name="q" required style="width: 80%" placeholder="Theo mã hàng, tên hàng" type="text" class="form-control">
                    <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="option form-inline">
                <form action="{{asset('b/glass/search')}}" method="get">
                    @csrf
                    <p class="option-name">Loại kính</p>
                    <select name="q" required style="width: 80%" id="" class="form-control">
                        <option value="0">--Lựa chọn--</option>
                        <option v-for="item in list_kinh_cate" :value="item.id">@{{item.ten}}</option>
                    </select>
                    <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="option form-inline">
                <form action="{{asset('b/glass/search')}}" method="get">
                    @csrf
                    <p class="option-name">Giá vốn</p>
                    <input name="q" required style="width: 80%" placeholder="ex: 10.000" type="text" class="form-control">
                    <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="option form-inline">
                <form action="{{asset('b/glass/search')}}" method="get">
                    @csrf
                    <p class="option-name">Giá bán</p>
                    <input name="q" required style="width: 80%" placeholder="ex: 10.000" type="text" class="form-control">
                    <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
                </form>
            </div>
        </div>
    </div>
</div>
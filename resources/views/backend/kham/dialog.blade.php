<div v-bind:style="[ isAdd ==true ? {'display':'block'}:{'display':'none'} ]" id="dialog_name" class="wrapper_dialog">
    <div class="dialog-k fade-scale" style="width: 500px;top:10%">
        <span v-on:click="isAdd=false" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>Thêm đơn thuốc</b></h4>
        </div>
        <div class="dialog-b">
            <form action="" method="post">
                <div class="row m0 p0">
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Chọn thuốc</label>
                            <select style="width: 100%" v-model="itemThuoc.id" @change="getText($event)" class="form-control">
                                <option v-for="item in list_thuoc" :value="item.id">@{{item.ten}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Số lượng</label>
                            <input v-model="itemThuoc.so_luong" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Cách dùng</label>
                            <textarea v-model="itemThuoc.lieu_dung" style="resize: none" name="" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="dialog-f">
            <button v-on:click="isAdd=false" class="btn btn-default">Close</button>
            <button v-on:click="addDSThuoc()" class="btn btn-success"> <span class="fa fa-plus"></span> Thêm</button>
        </div>
    </div>
</div>
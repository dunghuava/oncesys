<div v-bind:style="[ isAdd ==true ? {'display':'block'}:{'display':'none'} ]" id="dialog_name" class="wrapper_dialog">
    <div style="width:650px" class="dialog-k fade-scale">
        <span v-on:click="isAdd=false" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>
                <span v-if="!isUpdate">Thêm</span>
                <span v-if="isUpdate">Cập nhật</span> 
                kính</b>
            </h4>
        </div>
        <div class="dialog-b">
            @include('backend.kinh.form-kinh')
        </div>
        <div class="dialog-f">
            <button v-on:click="isAdd=false" class="btn btn-default">Close</button>
            <button v-if="!isUpdate" v-on:click="addKinh()" class="btn btn-success"> <span class="fa fa-save"></span> Lưu</button>
            <button v-if="isUpdate" v-on:click="updateKinh()" class="btn btn-success"> <span class="fa fa-save"></span> Lưu</button>
        </div>
    </div>
</div>

<div v-if="isAddCate" id="dialog_name" class="wrapper_dialog">
    <div class="dialog-k fade-scale">
        <span v-on:click="isAddCate=false" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>Thêm danh mục</b></h4>
        </div>
        <div class="dialog-b">
            <div class="row mb10">
                <div class="col-md-12">
                    <div class="f-row">
                        <label for="">Tên</label>
                        <input v-model="cate_name" required  type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog-f">
            <button v-on:click="isAddCate=false" class="btn btn-default">Close</button>
            <button v-on:click="addCateKinh()" class="btn btn-success"> <span class="fa fa-save"></span> Lưu</button>
        </div>
    </div>
</div>
<div v-if="isDelete" id="dialog_name" class="wrapper_dialog">
    <div class="dialog-k fade-scale">
        <span v-on:click="isDelete=false" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>Thông báo</b></h4>
        </div>
        <div class="dialog-b">
            <p>Xóa khỏi danh sách</p>
        </div>
        <div class="dialog-f">
            <button v-on:click="isDelete=false" class="btn btn-default">Close</button>
            <button v-on:click="deleteIdKinh()" class="btn btn-success"> <span class="fa fa-check"></span> Delete</button>
        </div>
    </div>
</div>
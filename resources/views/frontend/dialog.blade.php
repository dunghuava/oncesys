<div v-if="isdelete" id="dialog_name" class="wrapper_dialog">
    <div class="dialog-k fade-scale">
        <span v-on:click="isdelete=false" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>Thông báo</b></h4>
        </div>
        <div class="dialog-b">
            <p>Xóa khỏi danh sách</p>
        </div>
        <div class="dialog-f">
            <button v-on:click="isdelete=false" class="btn btn-default">Close</button>
            <button v-on:click="deleteId()" class="btn btn-success"> <span class="fa fa-check"></span> Delete</button>
        </div>
    </div>
</div>

<div v-if="isabout" id="dialog_name" class="wrapper_dialog">
    <div class="dialog-k fade-scale">
        <span v-on:click="isabout=false" class="fa fa-close"></span>
        <div class="dialog-b text-center">
            <h4 style="margin:0px">PHẦN MỀM QUẢN LÝ PHÒNG KHÁM</h4><br>
            <img style="width:80px" src="public/images/pm.png" alt="">
            <p>Phiên bản: 1.1</p>
            <p>Hotline: 0383868205</p>
            <p>Địa chỉ: F22, Bình Thạnh, HCMC</p>
        </div>
    </div>
</div>
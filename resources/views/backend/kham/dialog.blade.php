<div id="dialog_themthuoc" class="wrapper_dialog" style="display: none">
    <form onsubmit="return addDSThuoc()" style="margin-top: 5%;">
    <div class="dialog-k fade-scale" style="width: 500px;top:20%">
        <span onclick="$('#dialog_themthuoc').hide()" class="fa fa-close"></span>
        <div class="dialog-h">
            <h4><b>Thêm đơn thuốc</b></h4>
        </div>
        <div class="dialog-b">
                <div class="row m0 p0">
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Chọn thuốc</label>
                            <select required id="select_thuoc" style="width: 100%;height:45px !important"  class="form-control">
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Số lượng</label>
                            <input id="soluong_thuoc" required type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-cm-12">
                        <div class="f-row mb10">
                            <label for="">Cách dùng</label>
                            <textarea id="cachdung_thuoc" v-model="itemThuoc.lieu_dung" style="resize: none" name="" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="dialog-f">
            <button type="button" onclick="$('#dialog_themthuoc').hide()" class="btn btn-default">Close</button>
            <button type="submit" class="btn btn-success"> <span class="fa fa-plus"></span> Thêm</button>
        </div>
    </div>
    </form>
</div>
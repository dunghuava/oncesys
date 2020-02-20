<style>
    .tabs{display: none}
    .tabs_control{
        margin: 5px;
        padding: 0px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px
    }
    .tabs_control li{
        list-style: none;
        display: inline-flex;
        margin-right: 25px
    }
    .tabs_control li a{
        font-size: 16px;
        font-weight: bold;
        text-decoration: none !important;
    }
    .kq_div{
        width: 100%;
        padding: 40px 10px;
        background: #C3E4AD;
        border: 1px solid #ccc;
        text-align: center
    }
</style>
<div class="row m0 p10 pl0" style="padding-top: 0px">
    <div class="col-md-12 bg-w"><br>
        <ul class="tabs_control">
            <li data-id="tabs_1"><a href="javascript:void(0)">Tổng quan doanh thu trong năm</a></li>
        </ul>

        <div class="tabs_content">
            <div id="tabs_1" class="tabs" style="display: block">
                <canvas id="tongDoanhThu" width="800" height="350"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row m0 p10 pl0">
    <div class="col-md-12 bg-w"><br>
        <ul class="tabs_control p0 m0">
            <li data-id="tabs_1"><a href="javascript:void(0)">Tìm kiếm doanh thu</a></li>
        </ul><br>
        <div class="tabs_content">
            <div id="kq_div" class="kq_div">
                <h2>0<sup>đ</sup></h2>
            </div>
            <br><hr>
            <p class="form-group form-inline text-center" id="form_submit">
                @csrf
                <span>Từ ngày: </span>
                <input class="form-control datepicker" type="text" name="begin_date" id="begin_date">
                <span>Đến ngày: </span>
                <input class="form-control datepicker" type="text" name="end_date" id="end_date">
                <span>Type: </span>
                <select class="form-control" name="type" id="type">
                    <option value="DOANH_THU">Thống kê doanh thu</option>
                    <option value="BENH_NHAN">Thống kê bệnh nhân</option>
                    <option value="KINH">Thống kê kính</option>
                    <option value="THUOC">Thống kê thuốc</option>
                </select>
                <button onclick="calcThongKe()" class="btn btn-primary"><span class="fa fa-search"></span> Tra cứu</button>
            </p>
            <br><br><br><br>
        </div>
    </div>
</div>


<script>
    $('.tabs_control li').click(function (e) { 
        e.preventDefault();
        $('.tabs').hide();
        $('#'+$(this).attr('data-id')).show();
    });

    function calcThongKe(){
        var data = {
            begin_date:$('#begin_date').val(),
            end_date:$('#end_date').val(),
            type:$('#type').val(),
        };
        $.ajax({
            type: "post",
            url: "api/b/calc-thongke",
            data: {'data':data,_token: '{{csrf_token()}}'},
            success: function (response) {
                lazyload();$('#kq_div').html(response);
            }
        });
    }
</script>

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
</style>
<div class="row m0 p10 pl0" style="padding-top: 0px">
    <div class="col-md-12 bg-w"><br>
        <ul class="tabs_control">
            <li data-id="tabs_1"><a href="javascript:void(0)">Tổng doanh thu khám bệnh</a></li>
            <li data-id="tabs_2"><a href="javascript:void(0)">Tổng doanh thu vật tư</a></li>
        </ul>

        <div class="tabs_content">
            <div id="tabs_1" class="tabs" style="display: block">
                <canvas id="tongDoanhThu" width="800" height="350"></canvas>
            </div>
            <div id="tabs_2" class="tabs">
                <canvas id="tongVatTu" width="800" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    $('.tabs_control li').click(function (e) { 
        e.preventDefault();
        $('.tabs').hide();
        $('#'+$(this).attr('data-id')).show();
    });
</script>

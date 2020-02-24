<style>
    .wrapper_dialog{
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 99;
    }
    .wrapper_dialog .dialog-k .fa-close{
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 15px;
        cursor: pointer;
    }
    .wrapper_dialog .dialog-k{
        position: relative;
        top: 5%;
        left: 0;
        right: 0;
        margin: auto;
        padding: 15px;
        background: #fff;
        width: 450px;
        border-radius: 5px;
        animation: fade-scale 0.5s;
    }
    .wrapper_dialog .dialog-b{
        padding: 5px 0px;
    }
    .wrapper_dialog .dialog-f{
        text-align: right;
    }
    @keyframes fade-scale{
        from{
            transform: scale(0);
            opacity: 0;
            -webkit-transition: all .25s linear;
            -o-transition: all .25s linear;
            transition: all .25s linear;
        }
        to{
            opacity: 1;
            transform: scale(1); 
        }
    }
    .alert_note{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 120px;
        height: 80px;
        background: rgba(0, 0, 0, 0.4);
        color: #fff;
        font-size: 24px;
        border-radius: 5px;
        z-index: 999;
        padding: 5px;
        text-align: center;
        align-items: center;
    }
</style>

<script>
    function setMessage(header, mess) {
        $('#notify').show();
        $('#header').html(header);
        $('#mess').html(mess);
        setTimeout(() => {
            $('#notify').hide();
        }, 4000);
    }
</script>

<div class="alert_note" style="display: none">
    <p></p>
    <p style="margin:auto">Shift + F5</p>
    <p style="font-size: 12px">to refresh</p>
</div>

<script>
    setTimeout(() => {
        $('.alert_note').hide();
    }, 2000);
</script>

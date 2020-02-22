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
</style>

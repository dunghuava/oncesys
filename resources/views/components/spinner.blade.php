<style>
.lds-dual-ring {
  display: inline-block;
  width: 65px;
  height: 65px;
  background: green;
  border-radius: 50%;
  padding: 5px;
  position: relative;
}
.lds-dual-ring .circle{
  width: 100%;
  height: 100%;
  border:3px solid green;
  border-top: 3px solid white;
  border-bottom: 3px solid white;
  border-radius: 50%;
  animation: lds-dual-ring 1.5s linear infinite;

}
.lds-dual-ring .fa{
    position: absolute;
    top: 37%;
    left: 37%;
    z-index: 999;
    font-size: 18px;
    color: white;
    animation: lds-scale 1.2s linear infinite;
}
@keyframes lds-scale {
  0% {
    transform: scale(0.5);
  }
  50% {
    transform: scale(1.0);
  }
  100% {
    transform: scale(0.5);
  }
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(920deg);
  }
}

#preload{
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  z-index: 999999;
  text-align: center;
  background: rgba(0, 0, 0, 0.3);
  cursor: pointer;
}
</style>
<div id="preload" class="text-center">
  <div style="margin-top:20%" class="lds-dual-ring">
      <div class="circle">
      </div>
      <span class="fa fa-heart"></span>
  </div>
</div>

<script>
    $(document).ready(function () {
       lazyload();
    });
    function lazyload(){
        $('#preload').fadeIn();
        setTimeout(() => {
            $('#preload').fadeOut();
        }, 500);
    }
</script>
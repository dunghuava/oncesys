<div v-on:click="isdelete=true;id={{$item->id}}" class="user-item row" style="width: 16.6777%;float: left">
    <div class="col-md-12 text-center">
        <img src="public/images/user.png" alt="">
        <p><b>{{(++$k).'. '.$item->ho_ten}}</b></p>
    </div>
</div>
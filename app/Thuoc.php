<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuoc extends Model
{
    protected $table="db_thuoc";
    protected $guarded = ['id'];

    public function getType(){
        return $this->hasOne('App\LoaiThuoc','id','id_loai');
    }
}

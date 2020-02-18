<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinh extends Model
{
    protected $table="db_kinh";
    protected $guarded = ['id'];

    public function getType(){
        return $this->belongsTo('App\LoaiKinh','id','id_loai');
    }
}

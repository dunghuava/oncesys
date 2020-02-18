<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenhNhan extends Model
{
    protected $table = 'db_benhnhan';
    protected $guarded = ['id'];

    public function getProvince(){
        return $this->hasOne('App\Province','province_id','id');
    }
    public function getDistrict(){
        return $this->hasOne('App\District','district_id','id');
    }
    public function getWard(){
        return $this->hasOne('App\Ward','ward_id','id');
    }
}

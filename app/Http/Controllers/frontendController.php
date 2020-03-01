<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\District;
use App\Ward;
use App\BenhNhan;

class frontendController extends Controller
{
    function index (){
        $select=['db_benhnhan.id','ho_ten','tuoi','dia_chi','dien_thoai','province._name AS province','district._name as district','ward._name as ward'];
        $data['BenhNhan']=BenhNhan::select($select)
            ->leftjoin('province','province_id','province.id')
            ->leftjoin('district','district_id','district.id')
            ->leftjoin('ward','ward_id','ward.id')
            ->where('trang_thai','=',0)
            ->orderBy('id','desc')
            ->get();
        $data['Province']=Province::orderby('_name','asc')->get();
        $data['toltal_of_day']=BenhNhan::select('id')->where('created_at','like','%'.date('Y-m-d').'%')->get();
        return view ('frontend.index',$data);
    }
    function getDistrict($id){
        $data = District::where('_province_id',$id)->orderby('_name','asc')->get();
        return response()->json($data, 200);
    }
    function getWard($id){
        $data = Ward::where('_district_id',$id)->orderby('_name','asc')->get();
        return response()->json($data, 200);
    }
    public function saveBenhNhan(Request $request )
    {
        BenhNhan::create($request->all());
        return redirect('f');
    }
    function destroy($id){
        BenhNhan::destroy($id);
    }
}

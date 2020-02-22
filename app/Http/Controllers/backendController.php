<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiThuoc;
use App\LoaiKinh;
use App\Thuoc;
use App\Kinh;
use App\BenhNhan;
use App\KhamBenh;
use App\BangKinh;
use App\BangThuoc;
use Illuminate\Support\Facades\DB;

class backendController extends Controller
{
    function index (){
        $d=date('d');
        $m=date('m');
        $y=date('Y');

        $select=[
            'db_benhnhan.id',
            'db_benhnhan.ma_bn',
            'ho_ten',
            'ngay_sinh',
            'db_benhnhan.created_at',
            'tuoi',
            'dia_chi',
            'dien_thoai',
            'province._name AS province',
            'district._name as district',
            'ward._name as ward',
            'db_benhnhan.updated_at'
        ];
        
        $data['data']=BenhNhan::select($select)
            ->where('trang_thai',1)
            ->where(DB::raw('day(created_at)'),$d)
            ->where(DB::raw('month(created_at)'),$m)
            ->where(DB::raw('year(created_at)'),$y)
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('db_benhnhan.id','desc')
            ->get();

        $data['data_thuoc']=BangThuoc::select(
            [
                'db_bangthuoc.ten',
                'db_loaithuoc.ten as ten_loai',
                DB::raw('sum(db_bangthuoc.so_luong) as so_luong'),
                'db_bangthuoc.created_at'
            ])
        ->where(DB::raw('day(db_bangthuoc.created_at)'),$d)
        ->where(DB::raw('month(db_bangthuoc.created_at)'),$m)
        ->where(DB::raw('year(db_bangthuoc.created_at)'),$y)
        ->join('db_loaithuoc','db_bangthuoc.id_thuoc','db_loaithuoc.id')
        ->groupby(['db_bangthuoc.ten','db_loaithuoc.ten','db_bangthuoc.created_at'])
        ->get();

        $data['total']=KhamBenh::select([DB::raw('sum(chi_phi) as total')])
            ->where(DB::raw('day(created_at)'),$d)
            ->where(DB::raw('month(created_at)'),$m)
            ->where(DB::raw('year(created_at)'),$y)
            ->get()->first();
            return view ('backend.dasboard.index',$data);
    }
    function getThongKe(){
        $data = KhamBenh::select([
            DB::raw('sum(chi_phi) as chi_phi'),
            DB::raw('month (created_at) as thang')
        ])->orderby(DB::raw('month (created_at)'),'asc')->groupby(DB::raw('month(created_at)'))->get();
        return response()->json($data, 200);
    }
    function thuoc (){
        $select=['db_thuoc.id','db_thuoc.ma','db_thuoc.ten','db_loaithuoc.ten AS ten_loai','gia_von','gia_ban','so_luong','ngay_sx','han_sd','chi_tiet'];
        $data['data']=Thuoc::select($select)->leftjoin('db_loaithuoc','id_loai','=','db_loaithuoc.id')->orderBy('db_thuoc.id','desc')->paginate(10);
        return view ('backend.thuoc.index',$data);
    }
    function printer (){

        return view ('backend.printer.index');
    }
    function getThuoc(){
        $data = Thuoc::select(['db_thuoc.id','db_thuoc.ten','db_thuoc.gia_ban','db_thuoc.gia_von','db_loaithuoc.ten as loai'])
        ->join('db_loaithuoc','id_loai','db_loaithuoc.id')
        ->orderBy('ten','asc')->get();
        return response()->json($data, 200);
    }
    function thuocCategory (){
        return view ('backend.thuoc.category');
    }
    function kinh (){
        $select=['db_kinh.id','db_kinh.ma','db_kinh.ten','db_loaikinh.ten AS ten_loai','gia_von','gia_ban','so_luong','ngay_sx','han_sd','chi_tiet'];
        $data['data']=Kinh::select($select)->leftjoin('db_loaikinh','id_loai','=','db_loaikinh.id')->orderBy('db_kinh.id','desc')->paginate(10);
        return view ('backend.kinh.index',$data);
    }
    function searchKinh(){
        $q = $_GET['q'];

        $select=['db_kinh.id','db_kinh.ten','db_loaikinh.ten AS ten_loai','gia_von','gia_ban','so_luong','ngay_sx','han_sd','chi_tiet'];
        $data['data']=Kinh::select($select)
        ->where('db_kinh.ten','like','%'.$q.'%')
        ->orWhere('db_kinh.ma','=',$q)
        ->orWhere('db_kinh.id_loai','=',$q)
        ->orWhere('db_kinh.gia_ban','=',$q)
        ->orWhere('db_kinh.gia_von','=',$q)
        ->join('db_loaikinh','id_loai','=','db_loaikinh.id')
        ->orderBy('db_kinh.id','desc')
        ->paginate(10);
        $data['mess']='Kết quả tìm kiếm ('.count($data['data']).')';
        return view ('backend.kinh.index',$data); 
    }

    function searchThuoc(){
        $q = $_GET['q'];

        $select=['db_thuoc.id','db_thuoc.ten','db_loaithuoc.ten AS ten_loai','gia_von','gia_ban','so_luong','ngay_sx','han_sd','chi_tiet'];
        $data['data']=Thuoc::select($select)
        ->where('db_thuoc.ten','like','%'.$q.'%')
        ->orWhere('db_thuoc.ma','=',$q)
        ->orWhere('db_thuoc.id_loai','=',$q)
        ->orWhere('db_thuoc.gia_ban','=',$q)
        ->orWhere('db_thuoc.gia_von','=',$q)
        ->join('db_loaithuoc','id_loai','=','db_loaithuoc.id')
        ->orderBy('db_thuoc.id','desc')
        ->paginate(10);
        $data['mess']='Kết quả tìm kiếm ('.count($data['data']).')';
        return view ('backend.thuoc.index',$data);
    }
    function hoaDon (){
        $select=[
            'db_benhnhan.id',
            'db_benhnhan.ma_bn',
            'ho_ten',
            'ngay_sinh',
            'db_benhnhan.created_at',
            'tuoi',
            'dia_chi',
            'dien_thoai',
            'province._name AS province',
            'district._name as district',
            'ward._name as ward',
        ];
        
        $data['data']=BenhNhan::select($select)->where('trang_thai',1)
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('db_benhnhan.updated_at','desc')
            ->paginate(10);
        return view ('backend.hoa-don.index',$data);
    }
    function caclThongKe(Request $request){
        $data=null;
        $begin_date = $request->data['begin_date'];
        $end_date = $request->data['end_date'];
        $type = $request->data['type'];
        $date='abc_xyz';
        if (trim($begin_date)==trim($end_date)){
            $date=$begin_date;
        }
        
        if ($type=='DOANH_THU'){

            $data=$begin_date.'/'.$end_date;

            $res=KhamBenh::select([DB::raw('sum(chi_phi) as total')])
                ->whereBetween('created_at',array($begin_date,$end_date))
                ->get()->first();
            $data='<h2>'.number_format($res['total']).'<sup>đ</sup></h2>';
            
        }
        elseif ($type=='BENH_NHAN'){

            $res=KhamBenh::select([
                    DB::raw('sum(chi_phi) as money'),
                    DB::raw('count(id_benhnhan) as people')
                ])
                ->whereBetween('created_at',array($begin_date,$end_date))
                ->get()->first();
                 $data='<h2>'.$res['people'].'ng /'.number_format($res['money']).'<sup>đ</sup> </h2>';
            $res2=KhamBenh::select([
                'db_benhnhan.ho_ten',
                'db_benhnhan.ngay_sinh',
                'db_benhnhan.tuoi',
                'db_benhnhan.dien_thoai',
                'db_khambenh.chi_phi',
                'db_khambenh.created_at'
            ])->join('db_benhnhan','id_benhnhan','db_benhnhan.id')
              ->whereBetween('db_khambenh.created_at',array($begin_date,$end_date))
              ->get();
              $data.=   '<table border="1px" class="table_ajax" style="margin:auto">
                         <tr>
                            <td>S.t</td>
                            <td>Họ tên</td>
                            <td>Tuổi</td>
                            <td>Ngày sinh</td>
                            <td>Điện thoại</td>
                            <td>Chi phí</td>
                            <td>Ngày / Giờ</td>
                         </tr>';
                foreach ($res2 as $k => $item){
                  $k+=1;
                  $data.='<tr>
                            <td>'.$k.'</td> 
                            <td class="text-left"> '.$item['ho_ten'].'</td>
                            <td>&nbsp;&nbsp;'.$item['tuoi'].'</td>
                            <td>&nbsp;&nbsp;'.$item['ngay_sinh'].'</td>
                            <td>&nbsp;&nbsp;'.$item['dien_thoai'].'</td>
                            <td>&nbsp;&nbsp;'.number_format($item['chi_phi']).'<sup>đ</sup></td>
                            <td>&nbsp;&nbsp;'.$item['created_at'].'</td>
                        </tr>';
                }
                $data.'</table>';
        }
        elseif ($type=='KINH'){
            $data='kinh';
        }
        elseif ($type=='THUOC'){
            $data='';
            $res = BangThuoc::select([
                'db_bangthuoc.id_thuoc',
                'db_bangthuoc.ten',
                'db_bangthuoc.loai',
                DB::raw('sum(db_bangthuoc.so_luong) as so_luong'),
                DB::raw('(db_bangthuoc.gia) as gia_ban'),
                DB::raw('(db_bangthuoc.gia_von) as gia_von'),
            ])
            ->whereBetween('db_bangthuoc.created_at',array($begin_date,$end_date))
            ->groupby(['id_thuoc','ten','loai','so_luong','gia','gia_von'])->get();

            $tonglai=0;
            $tongvon=0;
            $data.=   '<table border="1px" class="table_ajax" style="margin:auto">
                        <tr>
                            <td>S.t</td>
                            <td>Tên thuốc</td>
                            <td>Số lượng</td>
                            <td>Loại</td>
                            <td>Giá bán</td>
                            <td>Giá vốn</td>
                            <td>Lãi</td>
                        </tr>';
            foreach ($res as $k => $item){
                $k+=1;
                $tongvon+=$item['gia_von']*$item['so_luong'];
                $lai = ($item['gia_ban']*$item['so_luong'])-($item['gia_von']*$item['so_luong']);
                $tonglai+=$lai;
                $data.='<tr>
                            <td>'.$k.'</td> 
                            <td class="text-left"> '.$item['ten'].'</td>
                            <td>&nbsp;&nbsp;'.$item['so_luong'].'</td>
                            <td>&nbsp;&nbsp;'.$item['loai'].'</td>
                            <td>&nbsp;&nbsp;'.number_format($item['gia_ban']*$item['so_luong']).'<sup>đ</sup></td>
                            <td>&nbsp;&nbsp;'.number_format($item['gia_von']*$item['so_luong']).'<sup>đ</sup></td>
                            <td>&nbsp;&nbsp;'.number_format($lai).'<sup>đ</sup></td>
                        </tr>';
            }
            $data.'     </table>';
            $data.='<h3>Tổng vốn: '.number_format($tongvon).'<sup>đ</sup> --o-- Tổng lãi: '.number_format($tonglai).'<sup>đ</sup></h3><br>';

        }
        return response()->json($data, 200);
    }
    function searchHoaDon(){
       $q = $_GET['q'];
        $select=[
            'db_benhnhan.ma_bn',
            'db_benhnhan.id',
            'ho_ten',
            'ngay_sinh',
            'db_benhnhan.created_at',
            'tuoi',
            'dia_chi',
            'dien_thoai',
            'province._name AS province',
            'district._name as district',
            'ward._name as ward',
        ];
        
        $data['data']=BenhNhan::select($select)
            ->where('ho_ten','like','%'.$q.'%')
            ->orWhere('dien_thoai','like','%'.$q.'%')
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('db_benhnhan.id','desc')
            ->paginate(10);
       $data['mess']='Kết quả tìm kiếm ('.count($data['data']).')';
       return view ('backend.hoa-don.index',$data); 
    }
    public static function getKhamBenh($id_benhnhan){
        return KhamBenh::where('id_benhnhan',$id_benhnhan)->get()->first();
    }
    public static function getBangKinh($id_khambenh){
        return BangKinh::where('id_khambenh',$id_khambenh)->get()->first();
    }
    public static function getBangThuoc($id_khambenh){
        return BangThuoc::where('id_khambenh',$id_khambenh)->get();
    }
    function thongKe (){
        return view ('backend.thong-ke.index');
    }
    function kinhCategory (){
        return view ('backend.kinh.category');
    }
    function addCateThuoc (Request $requet){
        $data = LoaiThuoc::create($requet->all());
        return response()->json($data, 200);
    }
    function addThuoc (Request $requet){
        $data = Thuoc::create($requet->all());
        return response()->json($data, 200);
    }
    function updateThuoc (Request $requet){
        $data = Thuoc::where('id',$requet->id)->update($requet->all());
        return response()->json($data, 200);
    }
    function getCateThuoc (){
        $data = LoaiThuoc::orderBy('ten','asc')->get();
        return response()->json($data, 200);
    }
    function delThuoc($id){
        Thuoc::destroy($id);
    }
    function getThuocById ($id){
        $data = Thuoc::where('id',$id)->get();
        return response()->json($data, 200);
    }
    function addCateKinh (Request $requet){
        $data = LoaiKinh::create($requet->all());
        return response()->json($data, 200);
    }
    function addKinh (Request $requet){
        $data = Kinh::create($requet->all());
        return response()->json($data, 200);
    }
    function updateKinh (Request $requet){
        $data = Kinh::where('id',$requet->id)->update($requet->all());
        return response()->json($data, 200);
    }
    function getCateKinh (){
        $data = LoaiKinh::orderBy('ten','asc')->get();
        return response()->json($data, 200);
    }
    function delKinh($id){
        Kinh::destroy($id);
    }
    function getKinh ($id){
        $data = Kinh::where('id',$id)->get();
        return response()->json($data, 200);
    }


    function khamBenh(){
        $select=['db_benhnhan.id','ho_ten','ma_bn','dia_chi','dien_thoai','province._name AS province','district._name as district','ward._name as ward'];
        $data['BenhNhan']=BenhNhan::select($select)->where('trang_thai','0')
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('id','asc')
            ->get();
        return view ('backend.kham.index',$data);
    }

    function getBenhNhanId($id){
        $select=['db_benhnhan.id','ho_ten','gioi_tinh','tuoi','dia_chi','dien_thoai','province._name AS province','district._name as district','ward._name as ward'];
        $data=BenhNhan::select($select)->where('db_benhnhan.id',$id)
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('id','asc')
            ->get(); 
        return response()->json($data, 200);    
    }
    public static function getBenhNhanId2($id){
        $select=['db_benhnhan.id','ho_ten','gioi_tinh','tuoi','dia_chi','dien_thoai','province._name AS province','district._name as district','ward._name as ward'];
        $data=BenhNhan::select($select)->where('db_benhnhan.id',$id)
            ->join('province','province_id','province.id')
            ->join('district','district_id','district.id')
            ->join('ward','ward_id','ward.id')
            ->orderBy('id','asc')
            ->get()->first(); 
        return $data;  
    }
    function saveKhamBenh(Request $request){
        $khambenh = $request->khambenh;
        $bangkinh = $request->bangkinh;
        $bangthuoc = $request->bangthuoc;
        if (!empty($khambenh))
        {
            $khambenh['chi_phi']=str_replace('.','',$khambenh['chi_phi']);
            $id_khambenh = KhamBenh::create($khambenh)->id;
            $bangkinh['id_khambenh']=$id_khambenh;
            BangKinh::create($bangkinh);
            foreach ($bangthuoc as $item){
                $item['id_khambenh']=$id_khambenh;
                $temp = Thuoc::find($item['id_thuoc']);
                $x = $temp['so_luong']-$item['so_luong'];
                Thuoc::where('id',$item['id_thuoc'])->update(['so_luong'=>$x]);
                BangThuoc::create($item);
            }
            BenhNhan::where('id',$khambenh['id_benhnhan'])->update(['trang_thai'=>1]);
       }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
use App\Models\Thuchi;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DasboardController extends Controller
{
    //
    function dates_month($month, $year) {
        $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dates_month = array();
    
        for ($i = 1; $i <= $num; $i++) {
            $mktime = mktime(0, 0, 0, $month, $i, $year);
            $date = date("d-M-Y", $mktime);
            $dates_month[$i] = $date;
        }
    
        return $dates_month;
    }
    public function display()
    {
        $TongDonhang =Donhang::whereDate('created_at',date('Y-m-d') )->count();
        $TongDonhang_thang =Donhang::whereMonth('created_at',date('m') )->count();

        $TongDonhangHoanThanh = Donhang::whereDate('created_at',date('Y-m-d') )
                                        ->where('Trang_thai','Hoàn thành')->count();
        $DH_HT = Donhang::where('Trang_thai','Hoàn thành')->whereDate('created_at',date('Y-m-d') )->get();

        $tong_gt = 0;
        foreach ($DH_HT as $key => $value) {
            $tong_gt+= $DH_HT[$key]->Tong_gia;
        }
        // 
        $thuchi = Thuchi::all();

        $day = date('Y-m-d');

        $thuchiInday = Thuchi::whereDate('created_at',date('Y-m-d'))->get();
        $thuchiMonth = Thuchi::whereMonth('created_at',date('n'))->get();
        // dd( $thuchiInday);
        $month_thu = 0;
        $month_chi = 0;
         foreach ($thuchiMonth as $key => $value) {
             $month_thu+=$thuchi[$key]->SoTen_Thu;
             $month_chi+=$thuchi[$key]->SoTen_Chi;
         }

         $day_thu = 0;
        $day_chi = 0;
         foreach ($thuchiInday as $key => $value) {
             $day_thu+=$thuchi[$key]->SoTen_Thu;
             $day_chi+=$thuchi[$key]->SoTen_Chi;

         }
        $a = $thuchi->count();
        $arr_data = $thuchi->toArray();
        // 


        return view('dashboard',[
            'countDonhang'=>$TongDonhang,
            'TongDonhang_thang'=>$TongDonhang_thang,
            'countDh_Hoanthanh'=>$TongDonhangHoanThanh,
            'count_gt_Dh_ht'=>$tong_gt,
           'month_thu'=>$month_thu,
           'month_chi'=>$month_chi,
           'day_thu'=>$day_thu,
           'day_chi'=>$day_chi,
            ]);
    }
    public function getDataToChart(){
        $data = Thuchi::whereDate('created_at','<=',date('Y-m-d'))->get();
        return ($data);
    }
    
}

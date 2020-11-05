<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
class DasboardController extends Controller
{
    //
    public function display()
    {
        $TongDonhang = Donhang::all()->count();
        $TongDonhangHoanThanh = Donhang::where('Trang_thai','Hoàn thành')->count();
        $DH_HT = Donhang::where('Trang_thai','Hoàn thành')->get();
        $tong_gt = 0;
        foreach ($DH_HT as $key => $value) {
            $tong_gt+=$DH_HT[$key]->Tong_gia;
        }

        return view('dashboard',[
            'countDonhang'=>$TongDonhang,
            'countDh_Hoanthanh'=>$TongDonhangHoanThanh,
            'count_gt_Dh_ht'=>$tong_gt,
            ]);
    }
}

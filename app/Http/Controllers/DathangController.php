<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
use App\Models\Mathang;
use Illuminate\Support\Facades\Auth;

class DathangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $donhang = Donhang::all();
       $username = Auth::user()->name;
        return view('ketoan.listBill',['donhang'=>$donhang,'username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $donhang = new Donhang;
        $donhang->id_user = Auth::user()->id;
        $donhang->Tg_giao = $request->input('Tg_giao');
        $donhang->Coc_truoc = $request->input('Coc_truoc');
        $donhang->Trang_thai = 'Đang xử lí';
        $donhang->Tong_gia = 0;
        $donhang->save();
///
        // $data = [];
        $giaDon= 0;
        foreach ($request->input('TenMH') as $key=>$id) {
         
            $mathang = new Mathang;
            $mathang->id_Donhang = $donhang->id;
            $mathang->TenMH = $request->TenMH[$key];
            $mathang->Soluong = $request->Soluong[$key];
            $mathang->Donvi = $request->Donvi[$key];
            $mathang->Don_gia = $request->Don_gia[$key];
            $mathang->save();

            $giaDon += ($mathang->Soluong * $mathang->Don_gia);

        }
        $donhang->Tong_gia = $giaDon - $donhang->Coc_truoc;
        $donhang->save(); 
        return redirect('/dathang')->with('status','Thêm thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $donhang = Donhang::find($id);
        $username = Auth::user()->name;
        $mathang = Mathang::where('id_Donhang',$id)->get();
        return view('ketoan.EditBill',['username'=>$username,'donhang'=>$donhang,'mathang'=>$mathang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
                    //
        $donhang = Donhang::find($id);
        $donhang->id_user = Auth::user()->id;
        $donhang->Tg_giao = $request->input('Tg_giao');
        $donhang->Coc_truoc = $request->input('Coc_truoc');
        $donhang->Trang_thai = 'Đang xử lí';
        $donhang->Tong_gia = 0;
        // $donhang->update();
///
        // $data = [];
        $giaDon= 0;
        foreach ($request->input('TenMH') as $key=>$key) {
         
            $mathang = Mathang::where('id_Donhang',$id)->delete();
        
            // foreach ($mathang as $k => $value) {
                # code...
                $mh = new Mathang;
                $mh->id_Donhang = $id;
                $mh->TenMH = $request->TenMH[$key];
                $mh->Soluong = $request->Soluong[$key];
                $mh->Donvi = $request->Donvi[$key];
                $mh->Don_gia = $request->Don_gia[$key];
                $mh->save();
                $giaDon += ($mh->Soluong * $mh->Don_gia);
           // }
        }
        $donhang->Tong_gia = $giaDon - $donhang->Coc_truoc;
        $donhang->update(); 
        return redirect('/dathang')->with('status','Cập nhật thành công.');
        } catch (\Throwable $th) {
           return redirect('/dathang')->with('status','Không thể cập nhật bản ghi này ... ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hoanthanh(Request $request, $id){
        try {
            //
            $donhang = Donhang::find($id);
            // $donhang->id_user = Auth::user()->id;
            // $donhang->Tg_giao = $request->input('Tg_giao');
            // $donhang->Coc_truoc = $request->input('Coc_truoc');
            $donhang->Trang_thai = 'Hoàn thành';
            // $donhang->Tong_gia = 0;
            // // $donhang->update();
            // ///
            // // $data = [];
            // $giaDon= 0;
            // foreach ($request->input('TenMH') as $key=>$key) {
            
            //     // $mathang = Mathang::where('id_Donhang',$id)->delete();

            //         # code...
            //         $mh =  Mathang::where('id_Donhang',$id);
            //         $mh->id_Donhang = $id;
            //         $mh->TenMH = $request->TenMH[$key];
            //         $mh->Soluong = $request->Soluong[$key];
            //         $mh->Donvi = $request->Donvi[$key];
            //         $mh->Don_gia = $request->Don_gia[$key];
            //         $mh->save();
            //         $giaDon += ($mh->Soluong * $mh->Don_gia);
            // // }
            // }
            // $donhang->Tong_gia = $giaDon - $donhang->Coc_truoc;
            $donhang->update(); 
            return redirect('/dathang')->with('status','Cập nhật thành công. Đã xác nhận đơn hàng.');
            } catch (\Throwable $th) {
            return redirect('/dathang')->with('status','Không thể cập nhật bản ghi này ... '.$th);
            }
    }
    public function destroy($id)
    {
    
    try {

        Mathang::where('id_Donhang',$id)->delete();
        $donhang = Donhang::find($id);
        $donhang->delete();
        return redirect('/dathang')->with('status','Xóa thành công đơn hàng....');
    } catch (\Throwable $th) {
       return redirect('/dathang')->with('status','Vui lòng kiểm tra lại thông tin.');
    }
    }
}

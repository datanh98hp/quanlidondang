<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
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
        $donhang->TenDH = $request->input('TenDH');
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
        $TongGiaMH= 0;
        try {
                    //
        $donhang = Donhang::find($id);
        $donhang->id_user = Auth::user()->id;
        $donhang->Tg_giao = $request->input('Tg_giao');
        $donhang->Coc_truoc = $request->input('Coc_truoc');
        $donhang->Trang_thai = 'Đang xử lí';
        $donhang->Tong_gia = 0;
       $donhang->update();
  
        Mathang::where('id_Donhang',$id)->delete(); // xóa cái cũ

        
        foreach ($request->input('TenMH') as $key=>$key) {
         // cập nhật lại list mat hàng
                $mh = new Mathang;
                
                $mh->updateOrCreate([
                    'id_Donhang'=>$id,
                    'TenMH'=>$request->TenMH[$key],
                    'Soluong'=> $request->Soluong[$key],
                    'Donvi'=>$request->Donvi[$key],
                    'Don_gia' => $request->Don_gia[$key]
                    ]);
                   
           // }
        }
                    
        $mh = Mathang::where('id_Donhang',$id)->get();
        foreach ($mh as $key => $value) {
            $TongGiaMH +=($mh[$key]->Soluong * $mh[$key]->Don_gia);
        }
        $donhang->Tong_gia = $TongGiaMH;
        $donhang->update();

       
        return redirect('/dathang')->with('status','Cập nhật thành công.');
        } catch (\Throwable $th) {
           return redirect('/dathang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function Del_one_Mathang($id){

        $mathang = Mathang::find($id);

        // CAP NHAT LẠI DƠN HÀNG
        $dh = Donhang::find($mathang->id_Donhang);
        // $dh->Tong_gia = 0;$dh->update();
        $mathang->delete();//xóa
        
        // $mh_of_DH = Mathang::where('id_Donhang',$dh->id); // tim ds mh còn lại trong dơn hàng
        // $tongGiaDH = 0;

        // foreach ($mh_of_DH as $key => $value) {
        //     $tongGiaDH += ($mh_of_DH[$key]->Soluong * $mh_of_DH[$key]->Don_gia );
        // }
        
        // $dh->Tong_gia = $tongGiaDH; 
        // $dh->update();
            
        return redirect('/edit-donhang'.'/'.$dh->id)->with('status','Cập nhật thành công.');
        
    }
    public function XacNhanXoa_one_Mathang($id){
        
        return view('ketoan.XoaMh',['id'=>$id]);
    }
    public function hoanthanh(Request $request, $id){
        try {
            //
            $donhang = Donhang::find($id);
          
            $donhang->Trang_thai = 'Hoàn thành';
         
            $donhang->update(); 
            return redirect('edit-donhang'.'/'.$id)->with('status','Cập nhật thành công. Đã xác nhận đơn hàng.');
            } catch (\Throwable $th) {
            return redirect('edit-donhang'.'/'.$id)->with('status','Không thể cập nhật bản ghi này ... '.$th);
            }
    }
    public function bo_hoanthanh(Request $request, $id){
        try {
            //
            $donhang = Donhang::find($id);
          
            $donhang->Trang_thai = 'Đang xử lí';
         
            $donhang->update(); 
            return redirect('edit-donhang'.'/'.$id)->with('status','Cập nhật thành công. Đã bỏ xác nhận đơn hàng.');
            } catch (\Throwable $th) {
            return redirect('edit-donhang'.'/'.$id)->with('status','Không thể cập nhật bản ghi này ... '.$th);
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
       return redirect('/dathang')->with('status','Vui lòng kiểm tra lại thông tin. Phiếu xuất tồn tại mã mặt hàng này'.$th);
    }
    }
    public function print($id){

        $donhang = Donhang::find($id);
        $list_mh = Mathang::where('id_Donhang',$id)->get();

        $tong_Gia = 0;

        foreach ($list_mh as $key => $value) {
            # code...
            $tong_Gia+=( $list_mh[$key]->Soluong*$list_mh[$key]->Don_gia);
        }

        return view('ketoan.PrintHoadon',
        [
            'dh'=>$donhang,
            'list_dh'=>$list_mh,
            'tongGia'=>$tong_Gia
        ]
        );
    }
}

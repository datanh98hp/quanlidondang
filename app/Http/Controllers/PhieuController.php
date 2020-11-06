<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Phieunhap;

use App\Models\Phieuxuat;


use App\Models\Vatlieu;
use App\Models\Donhang;
use Illuminate\Support\Facades\Auth;

class PhieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $phieunhap = Phieunhap::all();
        $phieuxuat = Phieuxuat::all()->except([1]);
        $ds_Donhang = Donhang::where('id_user',Auth::user()->id)->get();
        $ds_Vatlieu = Vatlieu::all();
        return view('Vatlieu.vatlieu',[
            'phieunhap'=>$phieunhap,
            'phieuxuat'=>$phieuxuat,
            'username'=>Auth::user()->name,
            'ds_Donhang'=>$ds_Donhang,
            'ds_Vatlieu'=>$ds_Vatlieu
            ]);
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
    public function store_Phieunhap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_phieunhap' => 'required|unique:Phieunhap|max:255',
            'TenVL' => 'required',
            'id_phieuxuat'=>'required|unique:Phieuxuat',
        ]);
        //
        try {
            //code...
            $phieunhap = new Phieunhap;
            $phieunhap->id_user = Auth::user()->id;
            // $phieunhap->Tgian_nhap = now();
            $phieunhap->Description = $request->input('Description');
            $phieunhap->save();
    // 
            foreach ($request->input('TenVL') as $key => $id) {
                # code...
                $vatlieu = new Vatlieu;
                $vatlieu->TenVL = $request->TenVL[$key];
                $vatlieu->Soluong_ton = $request->Soluong_ton[$key];
                $vatlieu->NSX = $request->NSX[$key];
                $vatlieu->Don_gia = $request->Don_gia[$key];
                $vatlieu->Donvi_tinh = $request->Donvi_tinh[$key];
                $vatlieu->id_phieunhap  = $phieunhap->id;
                $vatlieu->id_phieuxuat  = 1;
                $vatlieu->save();
            }
            
            $phieunhap->save();
            return redirect('/vatlieu')->with('status','Thêm thành công...');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/vatlieu')->withErrors($validator, 'TenVL')->with('status','Thêm thất bại ... Vui lòng kiểm tra lại dữ liệu nhập.');;
        }
       
    }
    public function store_Phieuxuat(Request $request)
    {
        $validator = $request->validate([
            'TenDH'=>'required|unique:Donhang',
            'TenVL'=>'required',
            'Soluong_xuat'=>'required',
            
        ]);
        //
    
        $phieuxuat = new Phieuxuat;
        $phieuxuat->id_user = Auth::user()->id;
        // $phieuxuat->Tgian_xuat = now();
        $phieuxuat->id_Donhang = $request->input('TenDH');

        // Cap nhat lai so luong vat lieu
        foreach ($request->input('TenVL') as $key => $id) {
            # code...
            $vatlieu = Vatlieu::find($request->TenVL[$key]);
            if($vatlieu->Soluong_ton>0){

                $vatlieu->Soluong_ton -= $request->Soluong_xuat[$key];

                $vatlieu->update();
            }else{
                return redirect('/vatlieu')->with('status',' Số lượng đã hết...');
            }
            
        }
        $phieuxuat->Description = $request->input('Description');
        $phieuxuat->save();
        // 
        return redirect('/vatlieu')->with('status','Thêm thành công...');

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nhanvien;
class NhanvienController extends Controller
{
    //
    public function index()
    {
        $nhanvien = Nhanvien::all();
        return view('Nhanvien.Nhanvien',['nhanvien'=>$nhanvien]);
    }
    public function create()
    {
        # code...
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        $nhanvien = Nhanvien::find($id);
        return view('Nhanvien.Edit-nhanvien',['nhanvien'=>$nhanvien]);

    }
    public function store(Request $request)
    {
        // làm viec 9h/ngay
        $nhanvien = new Nhanvien;
        $nhanvien->Hoten = $request->input('Hoten');
        $nhanvien->sdt = $request->input('sdt');
        $nhanvien->start_work = $request->input('start_work');
        $nhanvien->end_work = $request->input('end_work');
        $nhanvien->luong_h = $request->input('luong_h');
        $nhanvien->Position = $request->input('Position');
        $songaylam = floor( abs(strtotime($request->input('start_work')) - strtotime($request->input('end_work')) ) /(60*60*24) );
        switch ( $request->input('Position') ) {
            case 'admin':
                $nhanvien->Hesoluong = 2;
                break;
            case 'ketoan':
                $nhanvien->Hesoluong = 1.5;
                break;
            case 'designer':
                $nhanvien->Hesoluong = 1.5;
                break; 
            default:
                $nhanvien->Hesoluong = 1;
                break;
        }
        $nhanvien->Tienluong =  ($songaylam * $request->input('luong_h') * 9  ) + ( $nhanvien->Hesoluong * $request->input('luong_h') * 9 );
        $nhanvien->save();

        return redirect('nhanvien')->with('status','Success ... !');
    }
    public function update(Request $request,$id)
    {

        $nhanvien = Nhanvien::find($id);

        $nhanvien->Hoten = $request->input('Hoten');
        $nhanvien->sdt = $request->input('sdt');
        $nhanvien->start_work = $request->input('start_work');
        $nhanvien->end_work = $request->input('end_work');
        $nhanvien->luong_h = $request->input('luong_h');
        $nhanvien->Position = $request->input('Position');
        $songaylam = floor( abs(strtotime($request->input('start_work')) - strtotime($request->input('end_work')) ) /(60*60*24) );
        switch ( $request->input('Position') ) {
            case 'admin':
                $nhanvien->Hesoluong = 2;
                break;
            case 'ketoan':
                $nhanvien->Hesoluong = 1.5;
                break;
            case 'designer':
                $nhanvien->Hesoluong = 1.5;
                break; 
            default:
                $nhanvien->Hesoluong = 1;
                break;
        }
        // $nhanvien->Tienluong =  ($songaylam * $request->input('luong_h') * 9  ) + ( $nhanvien->Hesoluong * $request->input('luong_h') * 9 );
        $nhanvien->Tienluong = 0;
        $nhanvien->update();

        return redirect('nhanvien')->with('status','Updated...');

    }
    public function Tinh_luong($id)
    {
        
        $nhanvien = Nhanvien::find($id);
        $nhanvien->Tienluong =  ($songaylam * $request->input('luong_h') * 9  ) + ( $nhanvien->Hesoluong * $request->input('luong_h') * 9 );
        $nhanvien->update();

        return  $nhanvien->Tienluong;
    }
    public function delete($id)
    {
        try {
           $nhanvien= Nhanvien::find($id);
           $nhanvien->delete();
            return redirect('nhanvien')->with('status','Đã xóa');
        } catch (\Throwable $th) {
            
            return redirect('nhanvien')->with('status','Không thể xóa');
        }
    }
}
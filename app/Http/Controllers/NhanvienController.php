<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NhanvienController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user()->name;
        return view('Nhanvien.Nhanvien',['user'=>$user]);
    }
}

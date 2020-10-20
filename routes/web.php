<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\ThiepcuoiController;
use App\Http\Controllers\DathangController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VatlieuController;
use App\Http\Controllers\ManagerUserController;

use App\Http\Middleware\ChecTypeUser;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function ()
{
    return redirect('/dashboard');
});
Route::middleware(['auth:sanctum', 'checkType'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['auth:sanctun' => 'vertified'], function () {
    Route::get('nhanvien',[NhanvienController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::post('create-nhanvien',[NhanvienController::class,'store']);
    Route::get('edit-nhanvien/{id}',[NhanvienController::class,'edit']);
    Route::put('update-nhanvien/{id}',[NhanvienController::class,'update']);
    Route::delete('del-nhanvien/{id}',[NhanvienController::class,'delete']);


    Route::get('inthiepcuoi',[ThiepcuoiController::class,'index'])->middleware(['auth:sanctum','verified']);
    //// Cong viec
    Route::get('/task',[TaskController::class,'index']);
    // Route::post('/task/create',[TaskController::class,'create']);
    // Route::post('/task/update',[TaskController::class,'update']);
    // Route::post('/task/delete',[TaskController::class,'destroy']);
    Route::get('/thongke',[TaskController::class,'thongke']);
    ///
    Route::get('vatlieu',[VatlieuController::class,'index']);
// 
    Route::get('dathang',[DathangController::class,'index'])->middleware(['auth:sanctum','checkType']);
    
    //QL người dùng
    Route::get('usermanage',[ManagerUserController::class,'index']);
    Route::get('edit/user/{id}',[ManagerUserController::class,'edit']);
    Route::put('user/update/{id}',[ManagerUserController::class,'update']);
// 
});

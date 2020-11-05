<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\ThiepcuoiController;
use App\Http\Controllers\DathangController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VatlieuController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\DasboardController;
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
// Route::middleware(['auth:sanctum', 'checkType'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['auth:sanctun' => 'vertified'], function () {

    Route::get('dashboard',[DasboardController::class,'display'])->middleware(['auth:sanctum','verified'])->name('dashboard');
    ///
    Route::get('nhanvien',[NhanvienController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::post('create-nhanvien',[NhanvienController::class,'store']);
    Route::get('edit-nhanvien/{id}',[NhanvienController::class,'edit']);
    Route::put('update-nhanvien/{id}',[NhanvienController::class,'update']);
    Route::delete('del-nhanvien/{id}',[NhanvienController::class,'delete']);

    //thiepcuoi
    Route::get('inthiepcuoi',[ThiepcuoiController::class,'index'])->middleware(['auth:sanctum','verified']);
    Route::get('inthiepcuoi/chitiet/{id}',[ThiepcuoiController::class,'show'])->middleware(['auth:sanctum','verified']);
    Route::post('inthiepcuoi/create',[ThiepcuoiController::class,'store'])->middleware(['auth:sanctum','verified']);
    Route::get('inthiepcuoi/edit/{id}',[ThiepcuoiController::class,'edit'])->middleware(['auth:sanctum','verified']);
    Route::put('inthiepcuoi/update/{id}',[ThiepcuoiController::class,'update'])->middleware(['auth:sanctum','verified']);
    Route::delete('inthiepcuoi/delete/{id}',[ThiepcuoiController::class,'destroy'])->middleware(['auth:sanctum','verified']);

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
    Route::post('/create-donhang',[DathangController::class,'store'])->middleware(['auth:sanctum','checkType']);
    Route::get('/edit-donhang/{id}',[DathangController::class,'edit'])->middleware(['auth:sanctum','checkType']);
    Route::put('/update-donhang/{id}',[DathangController::class,'update'])->middleware(['auth:sanctum','checkType']);
    Route::delete('/del-donhang/{id}',[DathangController::class,'destroy'])->middleware(['auth:sanctum','checkType']);
    
    Route::put('/hoanthanh-donhang/{id}',[DathangController::class,'hoanthanh'])->middleware(['auth:sanctum','checkType']);
    
    //QL người dùng
    Route::get('usermanage',[ManagerUserController::class,'index']);
    Route::get('edit/user/{id}',[ManagerUserController::class,'edit']);
    Route::put('user/update/{id}',[ManagerUserController::class,'update']);
// 
});


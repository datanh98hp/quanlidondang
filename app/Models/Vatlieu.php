<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vatlieu extends Model
{
    use HasFactory;

    protected $table = 'vatlieu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenVL',
        'Soluong_ton',
        'NSX',
        'Don_gia',
        'Donvi_tinh',
        'id_phieunhap',
        'id_phieuxuat'
    ];


    public function Phieunhap()
    {
        return $this->belongTo('App\Models\Phieunhap');
    }

    public function Phieuxuat()
    {
        return $this->belongTo('App\Models\Phieuxuat');
    }
}

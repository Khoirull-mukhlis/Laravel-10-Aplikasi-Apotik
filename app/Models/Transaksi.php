<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = [];
    protected $fillable = ['user_id','tanggal','nama_barang', 'jumlah', 'harga','total_harga'];
}
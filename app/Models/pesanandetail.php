<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanandetail extends Model
{
    use HasFactory;
    protected $table = 'pesanan_detail';
    protected $guarded = [];
    protected $fillable = ['barang_id', 'pesanan_id', 'jumlah','jumlah_harga'];
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'barang_id');
    }
}

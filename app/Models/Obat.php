<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $primaryKey = 'id';
    protected $fillable = ['id_seller', 'nama_obat', 'jenis_obat','harga_obat', 'stok_obat', 'gambar_obat', 'deskripsi_obat'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller');
    }
    public function pesanandetail()
    {
        return $this->hasMany(pesanandetail::class,'id_seller');
    }
}


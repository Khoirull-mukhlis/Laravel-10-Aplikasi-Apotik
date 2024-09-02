<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'seller';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_apotik', 'nama_seller', 'contact_person','email', 'password', 'alamat', 'deskripsi'];

    public function obats()
    {
        return $this->hasMany(Obat::class,'id_seller');
    }
}




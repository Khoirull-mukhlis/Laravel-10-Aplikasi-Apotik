<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $guarded = [];
    protected $fillable = ['nama_dokter', 'alamat_dokter', 'no_telepon','spesialist', 'deskripsi'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
        use HasFactory;
        protected $table = 'pesanan';
        protected $guarded = [];
        protected $fillable = ['user_id', 'tanggal', 'status','jumlah_harga'];
}

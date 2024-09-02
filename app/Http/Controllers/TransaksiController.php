<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all(); // Ambil semua data transaksi

        return view('pesan/transaksi', compact('transaksis'));
    }
    public function destroy(string $id)
    {
       transaksi::where('id', $id)->delete();
        return redirect()->route('admin.transaksi')->with(['success' => 'Berhasil Menghapus Data pesanan']);
    }

    
}
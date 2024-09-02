<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PesanController extends Controller
{
    public function index($id)
    {
        $obat = Obat::where('id', $id)->first();
        return view('pesan.index', compact('obat'));
    }

    public function tampil(Request $request, $id)
    {
        // Periksa autentikasi pengguna
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        // Ambil data obat berdasarkan ID
        $obat = Obat::where('id', $id)->first();
        if (!$obat) {
            return redirect()->back()->withErrors('Obat tidak ditemukan.');
        }

        // Dapatkan tanggal saat ini
        $tanggal = Carbon::now();
        if($request->jumlah_pesan > $obat->stok_obat)
        {
            return redirect('pesan/'. $id)->with('Gagal', 'Melebihi stok yang ada.');
        }
        
        // Cek apakah ada pesanan aktif untuk user
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Jika tidak ada, buat pesanan baru
        if (!$pesanan) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0; // Inisialisasi dengan 0
            $pesanan->save();
        }

        // Cek apakah sudah ada detail pesanan untuk obat ini di pesanan yang aktif
        $pesanan_detail = PesananDetail::where('barang_id', $obat->id)
                                        ->where('pesanan_id', $pesanan->id)
                                        ->first();

        // Jika belum ada, buat detail pesanan baru
        if(!$pesanan_detail) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $obat->id;
            $pesanan_detail->pesanan_id = $pesanan->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $obat->harga_obat * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            // Jika sudah ada, tambahkan jumlah dan perbarui harga total
            $pesanan_detail->jumlah += $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga += $obat->harga_obat * $request->jumlah_pesan;
            $pesanan_detail->update();
        }

        // Perbarui jumlah harga pada pesanan
        $pesanan->jumlah_harga += $obat->harga_obat * $request->jumlah_pesan;
        $pesanan->update();
        
        return redirect()->route('admin.chekout')->with('success', 'Pesanan berhasil ditambahkan ke keranjang.');
    }

    public function check_out()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = collect(); // Initialize $pesanan_details as an empty collection

        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pesan.chek_out', compact('pesanan', 'pesanan_details'));
    }

    public function delete(string $id)
    {
        // Find the PesananDetail record
        $pesanan_detail = PesananDetail::findOrFail($id);

        // Find the associated Pesanan record
        $pesanan = Pesanan::findOrFail($pesanan_detail->pesanan_id);

        // Update the jumlah_harga
        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->save();

        // Delete the PesananDetail record
        $pesanan_detail->delete();

        // Redirect back to the check-out route with a success message
        return redirect()->route('shop.indexapotik')->with(['success' => 'Berhasil Menghapus keranjang']);
    }

    public function konfirmasi()
{
    // Ambil pesanan yang masih memiliki status 0 (belum dikonfirmasi)
    $pesananList = Pesanan::where('status', 0)->get();

    foreach ($pesananList as $pesanan) {
        // Ambil detail pesanan
        $pesananDetails = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        foreach ($pesananDetails as $detail) {
            // Ambil obat yang terkait dengan pesanan detail
            $obat = Obat::find($detail->barang_id);

            // Pastikan obat ditemukan
            if ($obat) {
                // Kurangi stok obat sesuai dengan jumlah yang dipesan
                $obat->stok_obat -= $detail->jumlah;
                $obat->save();

                // Simpan transaksi berdasarkan pesanan detail
                $transaksi = new Transaksi();
                $transaksi->user_id = $pesanan->user_id;
                $transaksi->tanggal = $pesanan->tanggal;
                $transaksi->nama_barang = $obat->nama_obat; // Ubah sesuai dengan field yang sesuai untuk nama barang
                $transaksi->jumlah = $detail->jumlah;
                $transaksi->harga = $obat->harga_obat;
                $transaksi->harga_total = $detail->jumlah_harga;
                $transaksi->save();
            }

            // Hapus pesanan detail saat ini
            $detail->delete();
        }

        // Ubah status pesanan menjadi telah dikonfirmasi (status 1)
        $pesanan->status = 1;
        $pesanan->save();
    }

    return redirect()->route('admin.chekout')->with('success', 'Pesanan berhasil dikonfirmasi dan dipindahkan ke transaksi.');
}


}
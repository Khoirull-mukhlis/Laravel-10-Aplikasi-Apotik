<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\obat;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ShopController extends Controller
{
    public function index()
    {
        $sel = Seller::paginate(3);

        return view('shop.indexapotik', compact('sel'));
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $sel = Seller::where('nama_apotik', 'LIKE', "%{$query}%")
    //                  ->orWhere('nama_seller', 'LIKE', "%{$query}%")
    //                  ->paginate(10);
    //     return view('shop.indexapotik', compact('sel'));
    // }
    public function showObatBySeller($id_seller)
    {
        $obats = Obat::where('id_seller', $id_seller)->get();
        return view('shop.indexobat', compact('obats'));
    }
    public function store(Request $request): RedirectResponse
    {
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'qty' => 1
        ]);
        return redirect('/shop');
    }
    public function map()
    {
        return view('shop.map');
    }
}

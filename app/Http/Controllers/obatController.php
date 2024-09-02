<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Seller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class obatController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:seller');
    }
    public function index()
    {
        $obat = Obat::with('seller')->orderBy('nama_obat', 'asc')->paginate(3);
        // $obat = Seller::all();
        // dd($seller);
        //render view with posts
        return view('seller.obat.DataObat', compact('obat'));
    }

    public function create(): View
    {
        // $obats = Obat::all();
        // return view('seller.obat.TambahObat', compact('obats'));
        $obat['seller'] = Seller::all();
        return view('seller.obat.TambahObat', $obat);
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id_seller' => 'required',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required',
            'stok_obat' => 'required',
            'gambar_obat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_obat' => 'required',
        ]);
        // dd($request->all());

        $photo      = $request->file('gambar_obat');
        $filename   = date('Y-m-d') . $photo->getClientOriginalName();
        $path       = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        Obat::create([
            'id_seller' => $request->id_seller,
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'harga_obat' => $request->harga_obat,
            'stok_obat' => $request->stok_obat,
            'gambar_obat' => $filename,
            'deskripsi_obat' => $request->deskripsi_obat
        ]);

        //redirect to index
        return redirect()->route('admin.obat')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id): View
    {
        $obat = Obat::findOrFail($id);
        //render view with post
        return view('obat', compact('obat'));
    }

    public function edit(string $id): View
    {
        $obat = Obat::findOrFail($id);

        //render view with post
        return view('seller/obat/EditObat', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obat = $this->validate($request, [

            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required',
            'stok_obat' => 'required',
            'gambar_obat' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_obat' => 'required',
        ]);

        $find = Obat::find($id);

        $photo      = $request->file('gambar_obat');

        if ($photo) {
            $filename   = date('Y-m-d') . $photo->getClientOriginalName();
            $path       = 'photo-user/' . $filename;

            if ($find->gambar_obat) {
                Storage::disk('public')->delete('photo-user/' . $find->gambar_obat);
            }
            Storage::disk('public')->put($path, file_get_contents($photo));
            $obat['gambar_obat']    = $filename;
        }

        $find->update($obat);
        return redirect()->route('admin.obat')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(string $id)
    {
        Obat::where('id', $id)->delete();
        return redirect()->route('admin.obat')->with(['success' => 'Berhasil Menghapus Data Obat']);
    }
}

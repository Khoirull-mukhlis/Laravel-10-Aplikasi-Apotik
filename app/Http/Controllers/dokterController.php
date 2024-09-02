<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class dokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:seller');
    }
    public function index()
    {
        $dokters = Dokter::latest()->paginate(10);

        //render view with posts
        return view('seller.dokter.DataDokter', compact('dokters'));
    }

    public function create(): View
    {
        return view('seller.dokter.TambahDokter');
    }

    
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_dokter' => 'required',
            'alamat_dokter' => 'required',
            'no_telepon' => 'required',
            'spesialist' => 'required',
            'deskripsi' => 'required',
        ]);

        
        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'alamat_dokter' => $request->alamat_dokter ,
            'no_telepon' => $request->no_telepon,
            'spesialist' => $request->spesialist,
            'deskripsi' => $request->deskripsi 
        ]);

        //redirect to index
        return redirect()->route('admin.dokter')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        $dokters = Dokter::findOrFail($id);

        //render view with post
        return view('seller/dokter/EditDokter', compact('dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokters = $this->validate($request, [
        //get post by ID
        'nama_dokter' => 'required',
        'alamat_dokter' => 'required',
        'no_telepon' => 'required',
        'spesialist' => 'required',
        'deskripsi' => 'required',

        ]);

        Dokter::where('id', $id)->update($dokters);
        return redirect()->route('admin.dokter')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(string $id)
    {
       dokter::where('id', $id)->delete();
        return redirect()->route('admin.dokter')->with(['success' => 'Berhasil Menghapus Data dokter']);
    }

}
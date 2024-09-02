<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class sellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        // $sellers = Seller::latest()->paginate(5);
        $sellers = Seller::orderBy('nama_apotik', 'asc')->paginate(5);
        //render view with posts
        return view('admin.apoteker.DataSeller', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.apoteker.TambahSeller');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_apotik' => 'required',
            'nama_seller' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        //create post
        Seller::create([
            'nama_apotik' => $request->nama_apotik,
            'nama_seller' => $request->nama_seller,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi
        ]);

        //redirect to index
        return redirect()->route('admin.seller')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $sellers = Seller::findOrFail($id);

        //render view with post
        return view('seller', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $sellers = Seller::findOrFail($id);

        //render view with post
        return view('admin/apoteker/EditSeller', compact('sellers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seller = $this->validate($request, [
            //get post by ID
            'nama_apotik' => 'required',
            'nama_seller' => 'required',
            'contact_person' => 'required',
            // 'email' => 'required',
            // 'password' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',

        ]);

        Seller::where('id', $id)->update($seller);
        return redirect()->route('admin.seller')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Temukan data seller berdasarkan id
        $seller = Seller::find($id);

        // Periksa apakah data seller ditemukan
        if (!$seller) {
            return redirect()->route('admin.seller')->with(['error' => 'Data Apoteker tidak ditemukan']);
        }

        // Periksa apakah masih ada obat terkait dengan seller ini
        if ($seller->obats()->exists()) {
            return redirect()->route('admin.seller')->with(['error' => 'Apoteker tidak dapat dihapus. Data obat masih terisi']);
        }

        // Hapus data seller jika tidak ada obat terkait
        $seller->delete();

        return redirect()->route('admin.seller')->with(['success' => 'Berhasil Menghapus Data Apoteker']);
    }
    // Seller::where('id', $id)->delete();
    // return redirect()->route('seller')->with(['success' => 'Berhasil Menghapus Data Apoteker']);
}

@extends('kerangka.master')
@section('content')
@include('include.navbar')
@include('include.style')

<form action="{{ route('admin.obat.update', ['id' => $obat->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_obat" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
            value="{{ old('nama_obat', $obat->nama_obat) }}" name="nama_obat" id="nama_obat"
            placeholder="Masukkan nama">
        @error('nama_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>    
    <div class="mb-3">
        <label for="jenis_obat" class="form-label">Jenis Obat</label>
        <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror"
            value="{{ old('jenis_obat', $obat->jenis_obat) }}" name="jenis_obat"id="jenis_obat"
            placeholder="masukkan nama">
        @error('jenis_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="harga_obat" class="form-label">Harga Obat</label>
        <input type="number" class="form-control @error('harga_obat') is-invalid @enderror"
            value="{{ old('harga_obat', $obat->harga_obat) }}" name="harga_obat"id="harga_obat"
            placeholder="masukkan nama">
        @error('harga_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="stok_obat" class="form-label">Stok Obat</label>
        <input type="number" class="form-control @error('stok_obat') is-invalid @enderror"
            value="{{ old('stok_obat', $obat->stok_obat) }}" name="stok_obat"id="stok_obat"
            placeholder="masukkan nama">
        @error('stok_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="gambar_obat" class="form-label">Masukkan Gambar</label><br>
        <div class="mb-3">
        @if($obat->gambar_obat)
        <td><img src="{{ asset('storage/photo-user/'.$obat->gambar_obat)}}" alt="" width="40"></td>
        @endif
    </div>
        <input type="file" class="form-control @error('gambar_obat') is-invalid @enderror"
            value="" name="gambar_obat"id="gambar_obat"
            placeholder="masukkan nama">
        @error('gambar_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deskripsi_obat" class="form-label">Deskripsi Obat</label>
        <input type="text" class="form-control @error('deskripsi_obat') is-valid @enderror" value="{{ old('deskripsi_obat', $obat->deskripsi_obat) }}"
            name="deskripsi_obat" id="deskripsi_obat">
        @error('deskripsi_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="far fa-save"></i> Submit</button>
    <a href="{{ route('admin.obat')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
</form>

@endsection

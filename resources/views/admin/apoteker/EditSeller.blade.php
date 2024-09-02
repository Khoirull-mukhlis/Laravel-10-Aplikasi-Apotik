@extends('kerangka.master')
@section('content')
@include('include.navbar')
@include('include.style')
@include('include.script')  

<form action="{{ route('admin.seller.update', ['id' => $sellers->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_apotik" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('nama_apotik') is-invalid @enderror"
            value="{{ old('nama_apotik') ?? $sellers->nama_apotik }}" name="nama_apotik"id="nama_apotik"
            placeholder="masukkan nama">
        @error('nama_obat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nama_seller" class="form-label">Nama Apoteker</label>
        <input type="text" class="form-control @error('nama_seller') is-valid @enderror"
            value="{{ old('nama_seller') ?? $sellers->nama_seller }}" name="nama_seller" id="nama_seller" placeholder="Masukkan Alamat">
        @error('nama_seller')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" class="form-control @error('contact_person') is-valid @enderror"
            value="{{ old('contact_person') ?? $sellers->contact_person }}" name="contact_person" id="contact_person">
        @error('contact_person')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-valid @enderror" value="{{ old('alamat') ?? $sellers->alamat }}"
            name="alamat" id="alamat">
        @error('alamat')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input class="form-control @error('deskripsi') is-valid @enderror" value="{{ old('deskripsi') ?? $sellers->deskripsi }}"
            name="deskripsi" type="text-area" id="deskripsi">
        @error('deskripsi')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> Submit</button>
    <a href="{{ route('admin.seller')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
</form>

@endsection
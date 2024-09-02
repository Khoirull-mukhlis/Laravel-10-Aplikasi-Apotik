@extends('kerangka.master')
@section('content')
@include('include.navbar')
@include('include.style')

<form action="{{ route('admin.dokter.update', ['id' => $dokters->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_dokter" class="form-label">Nama Dokter</label>
        <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror"
            value="{{ old('nama_dokter') ?? $dokters->nama_dokter }}" name="nama_dokter"id="nama_dokter"
            placeholder="masukkan nama dokter">
        @error('nama_dokter')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="alamat_dokter" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat_dokter') is-invalid @enderror"
            value="{{ old('alamat_dokter') ?? $dokters->alamat_dokter }}" name="alamat_dokter"id="alamat_dokter"
            placeholder="masukkan alamat dokter">
        @error('alamat_dokter')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="no_telepon" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
            value="{{ old('no_telepon') ?? $dokters->no_telepon }}" name="no_telepon"id="no_telepon"
            placeholder="masukkan nomor telepon">
        @error('no_telepon')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="spesialist" class="form-label">Spesialist</label>
        <input type="text" class="form-control @error('spesialist') is-invalid @enderror"
            value="{{ old('spesialist') ?? $dokters->spesialist }}" name="spesialist"id="spesialist"
            placeholder="masukkan spesialist anda">
        @error('spesialist')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') ?? $dokters->deskripsi }}"
            name="deskripsi" id="deskripsi">
        @error('deskripsi')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="far fa-save"></i> Submit</button>
    <a href="{{ route('admin.dokter')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
</form>

@endsection
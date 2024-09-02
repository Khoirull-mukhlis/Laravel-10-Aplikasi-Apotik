@extends('kerangka.master')
@section('content')
    @include('include.navbar')
    @include('include.style')

    <form action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control @error('nama_dokter') is-valid @enderror" value=""
                name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter">
            @error('nama_dokter')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat_dokter" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat_dokter') is-valid @enderror" value=""
                name="alamat_dokter" id="alamat_dokter" placeholder="Masukkan Alamat">
            @error('alamat_dokter')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No.Telphon</label>
            <input type="number" class="form-control @error('no_telepon') is-valid @enderror" value=""
                name="no_telepon" id="no_telepon" placeholder="Masukka No.Tlpn">
            @error('no_telepon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="spesialist" class="form-label">spesialist</label>
            <input type="text" class="form-control @error('spesialist') is-valid @enderror" value=""
                name="spesialist" id="spesialist" placeholder="Masukkan Spesialist">
            @error('spesialist')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Dokter</label>
            <textarea class="form-control @error('deskripsi') is-valid @enderror" value="" name="deskripsi" id="deskripsi"
                rows="3" placeholder="Masukkan Deskripsi"></textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="far fa-save"></i> Submit
        </button>
        <a href="{{ route('admin.dokter')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>

    </form>
@endsection
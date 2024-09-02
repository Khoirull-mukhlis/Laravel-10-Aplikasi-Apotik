@extends('kerangka.master')
@section('content')
    @include('include.navbar')
    @include('include.style')
    @include('include.script')

    <form action="{{ route('admin.obat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_seller" class="form-label">Masukkan nama seller anda</label><br>
            <select name="id_seller" id="id_seller" class="form-select @error('id_seller') is-invalid @enderror">
                <option disabled value="id">Pilih seller</option>
                <div class="mb-3">
                    @foreach ($seller as $sellers)
                        <option value="{{ $sellers->id }}"> - {{ $sellers->nama_seller }}</option>
                    @endforeach
                </div>
            </select>
            @error('id_seller')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" value=""
                name="nama_obat" id="nama_obat" placeholder="Masukkan Nama Obat">
            @error('nama_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_obat" class="form-label">Jenis Obat</label>
            <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror" value=""
                name="jenis_obat" id="jenis_obat" placeholder="Masukkan Jenis Obat">
            @error('jenis_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_obat" class="form-label">Harga Obat</label>
            <input type="number" class="form-control @error('harga_obat') is-invalid @enderror" value=""
                name="harga_obat" id="harga_obat" placeholder="Masukkan Harga Obat">
            @error('harga_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok_obat" class="form-label">Stok Obat</label>
            <input type="number" class="form-control @error('stok_obat') is-invalid @enderror" value=""
                name="stok_obat" id="stok_obat" placeholder="Masukkan Stok Obat">
            @error('stok_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar_obat" class="form-label">Masukkan Gambar</label>
            <input class="form-control @error('gambar_obat') is-invalid @enderror" value="" name="gambar_obat"
                type="file" id="gambar_obat">
            @error('gambar_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_obat" class="form-label">Deskripsi Obat</label>
            <textarea class="form-control @error('deskripsi_obat') is-invalid @enderror" value="" name="deskripsi_obat"
                id="deskripsi_obat" rows="3" placeholder="Masukkan Deskripsi Obat"></textarea>
            @error('deskripsi_obat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="far fa-save"></i> Submit</button>
        <a href="{{ route('admin.obat')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>

    </form>
@endsection

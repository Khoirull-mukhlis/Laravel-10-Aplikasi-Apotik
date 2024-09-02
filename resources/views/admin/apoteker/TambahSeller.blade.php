@extends('kerangka.master')
@section('content')
    @include('include.navbar')
    @include('include.style')
    @include('include.script')

    <form action="{{ route('admin.seller.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_apotik" class="form-label">Nama Apotik</label>
            <input type="text" class="form-control @error('nama_apotik') is-valid @enderror" value=""
                name="nama_apotik" id="nama_apotik" placeholder="Masukkan Nama Apotik">
            @error('nama_apotik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_seller" class="form-label">Nama Seller</label>
            <input type="text" class="form-control @error('nama_seller') is-valid @enderror" value=""
                name="nama_seller" id="nama_seller" placeholder="Masukkan nama seller">
            @error('nama_seller')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="contact_person" class="form-label">No.Telphon</label>
            <input type="number" class="form-control @error('contact_person') is-valid @enderror" value=""
                name="contact_person" id="contact_person" placeholder="Masukka No.Tlpn">
            @error('contact_person')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-valid @enderror" value="" name="email"
                id="email" placeholder="Masukkan Email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control @error('password') is-valid @enderror" value="" name="password" type="password"
                id="password" placeholder="Masukkan Password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-valid @enderror" value="" name="alamat" id="alamat"
                rows="3" placeholder="Masukkan Alamat"></input>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-valid @enderror" value="" name="deskripsi" id="deskripsi"
                rows="3" placeholder="Masukkan Deskripsi"></textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> Submit</button>
        <a href="{{ route('admin.seller')}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-rotate-left"></i> Kembali</a>
    </form>
@endsection

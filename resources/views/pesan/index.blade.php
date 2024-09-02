@extends('kerangka.master')
@section('content')
@section('title', 'Shopping')
@include('include.navbar')
@include('include.style')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('shop.indexapotik', $obat->id) }}" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-backward"></i> Kembali
            </a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/photo-user/' . $obat->gambar_obat) }}"
                                class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h3>{{ $obat->nama_obat }}</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($obat->harga_obat) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($obat->stok_obat) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Obat</td>
                                        <td>:</td>
                                        <td>{{ $obat->deskripsi_obat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.pesan', $obat->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control"
                                                    required="">
                                                <button type="submit" class="btn btn-outline-primary mt-3 btn-sm">
                                                    <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

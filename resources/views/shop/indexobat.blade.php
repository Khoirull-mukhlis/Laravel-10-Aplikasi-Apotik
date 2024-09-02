@extends('kerangka.master')
@section('content')
@section('title', 'Data Shopping')
@include('include.navbar')
@include('include.style')

<div class="container">
    <div class="row justify-content-center">
        @foreach ($obats as $get)
        <div class="col-md-4 mb-4"> <!-- Menambahkan margin-bottom pada kolom -->
            <div class="card h-100"> <!-- Menambahkan kelas h-100 untuk membuat semua kartu memiliki tinggi yang sama -->
                <img src="{{ asset('storage/photo-user/' . $get->gambar_obat) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Gambar Obat"> <!-- Mengatur gambar agar sesuai -->
                <div class="card-body">
                    <h5 class="card-title">{{ $get->nama_obat }}</h5>
                    <p class="card-text">
                        <strong>Harga:</strong> Rp. {{ number_format($get->harga_obat) }}<br>
                        <strong>Stok:</strong> {{ $get->stok_obat }}<br>
                        <strong>Keterangan:</strong> <br> {{ $get->deskripsi_obat }}
                    </p>
                    <a href="{{ route('admin.pesan', ['id' => $get->id]) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-cart-flatbed"></i> Pesan
                    </a>                    
                    <a href="{{ route('shop.indexapotik')}}" class="btn btn-outline-warning btn-sm">
                        <i class="fa-solid fa-rotate-left"></i> Kembali
                    </a>                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@endsection

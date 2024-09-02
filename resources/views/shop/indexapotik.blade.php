@extends('kerangka.master')
@section('title', 'Dashboard Apotik')
@section('content')
    @include('include.navbar')
    @include('include.style')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.chekout')}}">
                    <i class="fa fa-shopping-cart"></i> Keranjang Belanja
                </a>
            </li>
        </ul>
        <div class="row mt-3">
            @foreach ($sel as $get)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $get->nama_apotik }}</h5>
                            <p class="card-text">
                                <strong>Nama Apoteker:</strong> {{ $get->nama_seller }}<br>
                                <strong>Alamat:</strong> {{ $get->alamat }}<br>
                                <strong>Call:</strong> {{ $get->contact_person }}<br>
                                <strong>Deskripsi:</strong> {{ $get->deskripsi }}
                            </p>
                            <a href="{{ route('shop.indexobat', ['id' => $get->id]) }}"
                                class="btn btn-outline-info btn-sm">
                                <i class="fa-solid fa-clipboard-list"></i> Lihat Data Obat
                            </a>
                            <a href="{{ route('shop.map') }}" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-location-dot"></i> Lokasi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $sel->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
@endsection

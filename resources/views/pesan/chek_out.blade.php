@extends('kerangka.master')

@section('content')

@section('title', 'Pesanan')

@include('include.navbar')
@include('include.style')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.transaksi')}}">
                <i class="fa fa-shopping-cart"></i> Keranjang Belanja
            </a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 md-2">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                        @if (!empty($pesanan))
                            <p align="right">Tanggal pesan : {{ $pesanan->tanggal }}</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pesanan_detail->obat->nama_obat ?? 'Nama obat tidak ditemukan' }}
                                            </td>
                                            <td>{{ $pesanan_detail->jumlah }} obat</td>
                                            <td align="left">Rp.
                                                {{ number_format($pesanan_detail->obat->harga_obat) }}</td>
                                            <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.checkout', $pesanan_detail->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Batalkan</button>
                                                </form>
                                            </td>                                            
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Harga</strong></td>
                                        <td><strong>Rp.{{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td>
                                            <form action="{{ route('admin.konfirmasipesan')}}" method="">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

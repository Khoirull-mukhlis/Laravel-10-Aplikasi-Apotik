@extends('kerangka.master')
@section('content')
@section('title', 'Data Transaksi')
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Data Transaksi</h3>
                </div>
                <div class="card-body">
                    @if ($transaksis->isEmpty())
                        <p>Tidak ada data transaksi.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $index => $transaksi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $transaksi->tanggal }}</td>
                                        <td>{{ $transaksi->nama_barang }}</td>
                                        <td>{{ $transaksi->jumlah }}</td>
                                        <td>Rp. {{ number_format($transaksi->harga) }}</td>
                                        <td>Rp. {{ number_format($transaksi->harga_total) }}</td>
                                        <td>
                                        <a href="{{ route('admin.hapus.transaksi', ['id' => $transaksi->id]) }}"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-dumpster"></i> Batalkan Pesanan
                                                </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
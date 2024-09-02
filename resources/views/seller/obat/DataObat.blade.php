@extends('kerangka.master')
@section('content')
@section('title', 'Data Obat')
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

<div class="card">
    <div class="card-body">
        <div class="pb-3">
            <a href='{{ route('admin.obat.tambah') }}' class="btn btn-primary btn-sm">
                <i class="fa-solid fa-address-card"></i> Tambah Data</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Apoteker</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jenis Obat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok Obat</th>
                    <th scope="col">Gambar obat</th>
                    <th scope="col">Deskripsi Obat</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $no = ($obat->currentPage() - 1) * $obat->perPage();
                @endphp
                
                @foreach ($obat as $obats)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $obats->seller->nama_seller }}</td>
                        <td>{{ $obats->nama_obat }}</td>
                        <td>{{ $obats->jenis_obat }}</td>
                        <td>{{ $obats->harga_obat }}</td>
                        <td>{{ $obats->stok_obat }}</td>
                        <td><img src="{{ asset('storage/photo-user/' . $obats->gambar_obat) }}" alt=""
                                width="120"></td>
                        <td>{{ $obats->deskripsi_obat }}</td>
                        <td>
                            <a href="{{ route('admin.obat.edit', ['id' => $obats->id]) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirm-{{ $obats->id }}">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>

                            <div class="modal fade" id="confirm-{{ $obats->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fs-5" id="exampleModalLabel"><i
                                                    class="fa-sharp fa-solid fa-triangle-exclamation"></i> Peringatan!
                                            </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin Ingin Menghapus Data Obat dengan Nama
                                            <b>{{ $obats->nama_obat }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal"><i class="fa-solid fa-recycle"></i>
                                                Batal</button>
                                            <a href="{{ route('admin.obat.hapus', ['id' => $obats->id]) }}"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-dumpster"></i> Ya
                                                Hapus.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $obat->links() }}
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

@endsection

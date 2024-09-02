@extends('kerangka.master')
@section('content')
@section('title', 'Data Dokter')
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

<div class="card">
    <div class="card-body">
        <div class="pb-3">
            <a href="{{ route('admin.dokter.tambah') }}" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-address-card"></i> Tambah Data</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Alamat Dokter</th>
                    <th scope="col">No. Telephon</th>
                    <th scope="col">Spesialist</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($dokters as $dokters)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $dokters->nama_dokter }}</td>
                        <td>{{ $dokters->alamat_dokter }}</td>
                        <td>{{ $dokters->no_telepon }}</td>
                        <td>{{ $dokters->spesialist }}</td>
                        <td>{{ $dokters->deskripsi }}</td>
                        <td>
                            <a href="{{ route('admin.dokter.edit', ['id' => $dokters->id]) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirm-{{ $dokters->id }}">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>

                            <div class="modal fade" id="confirm-{{ $dokters->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fs-5" id="exampleModalLabel"><i
                                                    class="fa-sharp fa-solid fa-triangle-exclamation"></i> Peringatan!
                                            </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin Ingin Menghapus Data Dokter dengan Nama
                                            <b>{{ $dokters->nama_dokter }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal"><i class="fa-solid fa-recycle"></i>
                                                Batal</button>
                                            <a href="{{ route('admin.dokter.hapus', ['id' => $dokters->id]) }}"
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

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

@endsection

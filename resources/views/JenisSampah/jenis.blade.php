@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Sampah</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ url('addJenisSampah') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i>Add Jenis Sampah</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama dan ID Sampah</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Harga (Kg)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenisSampah as $item)
                            <tr>
                                <td>{{ $item->jenis_sampah }} - {{ $item->id_sampah }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->foto }}</td>
                                <td>Rp. {{ $item->harga_per_kg }}</td>
                                <td>
                                    <a href="{{ url('editJenisSampah') }}/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('deleteJenisSampah') }}/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

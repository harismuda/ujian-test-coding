@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Jenis Sampah</h6>
            </div>
            <div class="card-body">
                @foreach ($jenisSampah as $item)  
                <form action="{{ url('updateJenisSampah') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="mb-2">
                        <label for="" class="form-label">Pilih Jenis Sampah</label>
                        <select name="id_sampah" class="form-control">
                            @foreach ($sampah as $item)
                                <option value="{{ $item->id_sampah }}">{{ $item->jenis_sampah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="{{ $item->deskripsi }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Foto</label>
                        <input type="text" class="form-control" name="foto" value="{{ $item->foto }}">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Harga (Kg)</label>
                        <input type="number" class="form-control" name="harga" value="{{ $item->harga_per_kg }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
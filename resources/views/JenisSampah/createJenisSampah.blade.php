@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Jenis Sampah</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('storeJenisSampah') }}" method="post">
                    @csrf
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
                        <input type="text" class="form-control" name="deskripsi" required>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Foto</label>
                        <input type="text" class="form-control" name="foto">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Harga (Kg)</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
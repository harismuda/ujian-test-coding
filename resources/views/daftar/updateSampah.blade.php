@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Sampah</h6>
            </div>
            <div class="card-body">
                @foreach ($sampah as $item)   
                <form action="{{ url('updateSampah') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_sampah" value="{{ $item->id_sampah }}">
                    <div class="mb-2">
                        <label for="" class="form-label">Jenis Sampah</label>
                        <input type="text" class="form-control" name="jenis_sampah" value="{{ $item->jenis_sampah }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
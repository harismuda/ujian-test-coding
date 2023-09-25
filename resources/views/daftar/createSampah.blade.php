@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Sampah</h6>
            </div>
            <div class="card-body">
                <form action="{{ url('storeSampah') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="" class="form-label">Jenis Sampah</label>
                        <input type="text" class="form-control" name="jenis_sampah" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
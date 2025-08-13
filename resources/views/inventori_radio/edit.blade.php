@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Inventori Radio</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('inventori.update', $inventori->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nomor_seri">Nomor Seri:</label>
                            <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri', $inventori->nomor_seri) }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pemasangan">Tanggal Pemasangan:</label>
                            <input type="date" class="form-control" id="tanggal_pemasangan" name="tanggal_pemasangan" value="{{ old('tanggal_pemasangan', $inventori->tanggal_pemasangan) }}">
                        </div>

                        <div class="form-group">
                            <label for="waktu_pemakaian">Waktu Pemakaian:</label>
                            <input type="text" class="form-control" id="waktu_pemakaian" name="waktu_pemakaian" value="{{ old('waktu_pemakaian', $inventori->waktu_pemakaian) }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $inventori->keterangan) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

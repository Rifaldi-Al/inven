@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Inventori Radio Jaringan</div>

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

                    <form method="POST" action="{{ route('inventori.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_seri">Nomor Seri:</label>
                            <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri') }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pemasangan">Tanggal Pemasangan:</label>
                            <input type="date" name="tanggal_pemasangan" class="form-control" id="tanggal_pemasangan" name="tanggal_pemasangan" value ="{{ old('tanggal_pemakaian') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu_pemakaian">Waktu Pemakaian (Tahun):</label>
                            <input type="number" class="form-control" id="waktu_pemakaian" name="waktu_pemakaian" value="{{ old('waktu_pemakaian') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

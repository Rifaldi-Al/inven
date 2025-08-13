@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Jabatan</div>

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

                    <form method="POST" action="{{ route('jabatan.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="kode_jabatan">Kode Jabatan:</label>
                            <input type="text" class="form-control" id="kode_jabatan" name="kode_jabatan" value="{{ old('kode_jabatan') }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Kop Surat:</label>
                            <input class="form-control" type="file" name="kop_file">
                        </div>

                        <div class="form-group">
                            <label for="bidang_id">Bidang id:</label>
                            <select class="form-control" name="bidang_id" id="bidang_id">
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

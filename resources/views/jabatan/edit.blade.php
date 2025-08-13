@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Jabatan</div>

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

                    <form method="POST" action="{{ route('jabatan.update', $jabatan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kode_jabatan">Kode Jabatan:</label>
                            <input type="text" class="form-control" id="kode_jabatan" name="kode_jabatan" value="{{ $jabatan->kode_jabatan }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $jabatan->nama) }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Kop Surat:</label>
                            <input class="form-control" type="file" name="kop_file">
                        </div>

                        <div class="form-group">
                            <label for="bidang_id">Bidang:</label>
                            <select name="bidang_id" class="form-control" required>
                                @foreach ($bidang as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $jabatan->bidang_id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

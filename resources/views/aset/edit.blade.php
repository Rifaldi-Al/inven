@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Aset Pegawai</div>

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

                    <form method="POST" action="{{ route('aset.update', $aset->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nik">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $aset->nik) }}">
                        </div>

                        <div class="form-group" id="pegawai-field">
                            <label for="id_pegawai">Nama :</label>
                            <select name="id_pegawai" class="form-control" required>
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon :</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $aset->nomor_telepon) }}">
                        </div>

                        <div class="form-group">
                            <label for="departemen">Departemen :</label>
                            <input type="text" class="form-control" id="departemen" name="departemen" value="{{ old('departemen', $aset->departemen) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

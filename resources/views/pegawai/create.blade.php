@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Data Pegawai</div>

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

                    <form method="POST" action="{{ route('pegawai.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nik">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="departemen">Deaprtemen:</label>
                            <input type="text" class="form-control" id="departemen" name="departemen" value="{{ old('departemen') }}">
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                        </div>

                        <div class="form-group" id="pegawai-field">
                            <label for="id_kantor">Area Kerja:</label>
                            <select name="id_kantor" class="form-control" required>
                                @foreach($kantors as $kantor)
                                    <option value="{{ $kantor->id }}" {{ $kantor->nama == $selectedKantor ? 'selected' : '' }}>
                                        {{ $kantor->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="umh">UMH:</label>
                            <input type="text" class="form-control" id="umh" name="umh" value="{{ old('umh') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

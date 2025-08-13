@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Log Radio</div>

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

                    <form method="POST" action="{{ route('log.update', $log->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $log->tanggal) }}">
                        </div>

                        <div class="form-group">
                            <label for="perangkat_lama">Perangkat Lama:</label>
                            <input type="text" class="form-control" id="perangkat_lama" name="perangkat_lama" value="{{ old('perangkat_lama', $log->perangkat_lama) }}">
                        </div>

                        <div class="form-group">
                            <label for="perangkat_baru">Perangkat Baru:</label>
                            <input type="text" class="form-control" id="perangkat_baru" name="perangkat_baru" value="{{ old('perangkat_baru', $log->perangkat_baru) }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $log->keterangan) }}">
                        </div>

                        <div class="form-group" id="pegawai-field">
                            <label for="id_pegawai">Teknisi:</label>
                            <select name="id_pegawai" class="form-control" required>
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan:</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" value="{{ old('catatan', $log->catatan) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

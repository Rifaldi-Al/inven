@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Laporan Aset Pegawai</div>

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

                    <form method="POST" action="{{ route('laporan.update', $laporan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_aset">Nama Aset :</label>
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ old('nama_aset', $laporan->nama_aset) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_seri">Nomor Seri :</label>
                            <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri', $laporan->nomor_seri) }}">
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis Aset :</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis', $laporan->jenis) }}">
                        </div>

                        <div class="form-group">
                            <label for="pegawai">Nama Pemilik Aset :</label>
                            <input type="text" class="form-control" id="pegawai" name="pegawai" value="{{ old('pegawai', $laporan->pegawai) }}">
                        </div>

                        <div class="form-group">
                            <label for="masuk">Tanggal Aset Masuk :</label>
                            <input type="text" class="form-control" id="masuk" name="masuk" value="{{ old('masuk', $laporan->masuk) }}">
                        </div>

                        <div class="form-group">
                            <label for="keluar">Tanggal Aset Keluar :</label>
                            <input type="text" class="form-control" id="keluar" name="keluar" value="{{ old('keluar', $laporan->keluar) }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan Aset :</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $laporan->keterangan) }}">
                        </div>

                        <div class="form-group">
                            <label for="waktu_pengerjaan">Waktu Perbaikan :</label>
                            <input type="text" class="form-control" id="waktu_pengerjaan" name="waktu_pengerjaan" value="{{ old('waktu_pengerjaan', $laporan->waktu_pengerjaan) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

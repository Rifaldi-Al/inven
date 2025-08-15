@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Maintenace</div>

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

                    <form method="POST" action="{{ route('maintenance.update', $maintenance->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nik">Nomor Seri</label>
                            <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri', $maintenance->detailaset->nomor_seri) }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $maintenance->detailaset->aset->nama) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Nama Pemilik Aset</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $maintenance->pegawai->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="departemen">Tanggal Aset Masuk</label>
<input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan"
       value="{{ old('tanggal_perbaikan', $maintenance->tanggal_perbaikan ? \Carbon\Carbon::parse($maintenance->tanggal_perbaikan)->format('Y-m-d') : '') }}">                        </div>

                        <div class="form-group">
                            <label for="departemen">Tanggal Aset Keluar</label>
                            <input type="date" class="form-control" id="keluar" name="keluar" value="{{ old('keluar') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Lama Pengerjaan</label>
                            <input type="text" class="form-control" id="waktu_pengerjaan" name="waktu_pengerjaan" value="{{ old('waktu_pengerjaan') }}">
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan">{{ $maintenance->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{ $maintenance->status }}">{{ $maintenance->status }}</option>
                                <option value="Terima">Terima</option>
                                <option value="Tolak">Tolak</option>
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

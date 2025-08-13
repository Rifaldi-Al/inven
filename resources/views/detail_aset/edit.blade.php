@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Detail Aset Pegawai</div>

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

                    <form method="POST" action="{{ route('detail_aset.update', $detail_aset->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama_aset">Nama Aset:</label>
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ old('nama_aset', $detail_aset->nama_aset) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_seri">Nomor Seri :</label>
                            <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri', $detail_aset->nomor_seri) }}">
                        </div>

                        <div class="form-group">
                            <label for="merk">Merk / Model :</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk', $detail_aset->merk) }}">
                        </div>

                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi :</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="{{ old('spesifikasi', $detail_aset->spesifikasi) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Aset Hardware</div>

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

                    <form method="POST" action="{{ route('aset.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Aset</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk') }}">
                        </div>

                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="{{ old('spesifikasi') }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pembelian">Tanggal Pembelian</label>
                            <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}">
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" class="form-control" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Digunakan">Digunakan</option>
                                <option value="Di Gudang">Di Gudang</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pembelian">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                            <small class="form-text text-muted">
                                Format: JPG, PNG, JPEG | Maksimal: 2MB
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

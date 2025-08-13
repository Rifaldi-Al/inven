@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kategori Aset</div>

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

                    <form method="POST" action="{{ route('kategori.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}">
                            <div class="form-group" id="kategori_alat">
                                <label for="kategori_alat">Nama:</label>
                                <select name="kategori_alat" class="form-control" required>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Jaringan">Jaringan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Inventaris</div>

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
                            <h1 class="text-info">Nama Alat: {{ $aset->aset->nama }}</h1>
                            {{-- <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $aset->aset->nama) }}" readonly> --}}
                        </div>

                        <div class="form-group">
                            <h1 class="text-info">Kode Aset: {{ $aset->nomor_seri }}</h1>
                        </div>

                        <div class="form-group" id="pegawai-field">
                            <label for="id_pegawai">Penanggung Jawab</label>
                            <select name="id_pegawai" class="form-control" required>
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
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

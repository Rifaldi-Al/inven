@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Data Log Radio</div>

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

                    <form method="POST" action="{{ route('log.store') }}">
                        @csrf
                        <div class="form-group" id="inventori-field">
                            <label for="id_inventori_radio">Nomor Seri Radio:</label>
                            <select name="id_inventori_radio" class="form-control" required>
                                @foreach ($inventoris as $inventori)
                                    <option value="{{ $inventori->id }}">{{ $inventori->nomor_seri }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                        </div>

                        <div class="form-group">
                            <label for="perangkat_lama">Perangkat Lama:</label>
                            <input type="text" class="form-control" id="perangkat_lama" name="perangkat_lama" value="{{ old('perangkat_lama') }}">
                        </div>

                        <div class="form-group">
                            <label for="perangkat_baru">Perangkat Baru:</label>
                            <input type="text" class="form-control" id="perangkat_baru" name="perangkat_baru" value="{{ old('perangkat_baru') }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="id_pegawai">Nama Pegawai:</label>
                            <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="{{ old('id_pegawai') }}">
                        </div> --}}

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
                            <input type="text" class="form-control" id="catatan" name="catatan" value="{{ old('catatan') }}">
                        </div>

                        {{-- <input type="hidden" id="id_inventori_radio" name="id_inventori_radio" value="{{ $selectedInventori }}"> --}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

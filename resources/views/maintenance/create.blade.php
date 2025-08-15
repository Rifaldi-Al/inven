@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Maintenance</div>
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

                    <form method="POST" action="{{ route('maintenance.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Nama Alat</label>
                            <select  class="form-control" id="id_detail" name="id_detail">
                                @foreach ($aset as $a)
                                <option value="{{ $a->id }}">{{ $a->aset->nama }} - {{ $a->nomor_seri }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Tanggal Perbaikan</label>
                            <input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" value="{{ old('tanggal_perbaikan') }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Keterangan</label>
                            <textarea  id="keterangan" name="keterangan" value="{{ old('keterangan') }}" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

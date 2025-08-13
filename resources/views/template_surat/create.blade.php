@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Jenis Bidang</div>

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

                        <form method="POST" action="{{ route('template_surat.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Template Surat:</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama') }}">
                            </div>

                            <div class="form-group">
                                <label for="id">ID Jenis Surat:</label>
                                <input type="text" class="form-control" id="id" name="id"
                                    value="{{ old('id') }}">
                            </div>

                            <div class="form-group">
                                <label for="pembuat">Pembuat:</label>
                                <input type="text" class="form-control" id="pembuat" name="pembuat"
                                    value="{{ old('pembuat') }}">
                            </div>

                            <div class="form-group">
                                <label for="bidang">ID Bidang:</label>
                                <input type="text" class="form-control" id="bidang" name="bidang"
                                    value="{{ old('bidang') }}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    value="{{ old('deskripsi') }}">
                            </div>

                            <div class="form-group">
                                <label for="bidang_id">Nama File:</label>
                                <select name="bidang_id" class="form-control" required>
                                    @foreach ($bidangs as $bidang)
                                        <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

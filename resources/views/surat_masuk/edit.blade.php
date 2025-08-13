@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Surat</div>

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

                        <form method="POST" action="{{ route('surat_masuk.update', $suratmasuks->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" id="perihal" name="perihal"
                                        value ="{{ old('perihal') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="file_surat">File Surat<span class="required" style="color: red">* <i style="text-size:11px;">(Ekstensi : Pdf)</i> </span>
                                    </label>
                                    <div class="custom-file">
                                    <input type="file" name="file_surat" class="custom-file-input" id="file_surat" name="file_surat"
                                        value ="{{ old('file_surat') }}" required>
                                    <label class="custom-file-label" id="file_surat" for="file_surat">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" name="tanggal"
                                        value ="{{ old('tanggal') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" name="pengirim" class="form-control" id="pengirim" name="pengirim"
                                        value ="{{ old('pengirim') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" name="status"
                                        value ="{{ old('status') }}" required>
                                        <option value="approve">Approve</option>
                                        <option value="disposisi">Disposisi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="created_by">Penerima</label>
                                    <select name="created_by" class="form-control" required>
                                        @foreach ($bidangs as $bidang)
                                            <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="users_jabatan">Jabatan Penerima</label>
                                    <select name="users_jabatan" class="form-control" required>
                                        @foreach ($usersjabatans as $usersjabatan)
                                            <option value="{{ $usersjabatan->id }}">{{ $usersjabatan->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Surat</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

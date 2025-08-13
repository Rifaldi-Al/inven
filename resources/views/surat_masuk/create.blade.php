@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Surat Masuk</div>

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

                    <form method="POST" action="{{ route('surat_masuk.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" name="perihal" class="form-control" id="perihal" value="{{ old('perihal') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="file_surat">File Surat<span class="required" style="color: red">* <i style="font-size:11px;">(Ekstensi: Pdf, Jpg, Png)</i> </span></label>
                            <div class="custom-file">
                                <input type="file" name="file_surat" class="custom-file-input" id="file_surat" value="{{ old('file_surat') }}" required>
                                <label class="custom-file-label" id="file_surat_label" for="file_surat">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal') }}" required>
                        </div>

                        <input type="hidden" name="pengirim" class="form-control" id="pengirim" value="{{ Auth::user()->name }}" required>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="approve">Approve</option>
                                <option value="disposisi">Disposisi</option>
                            </select>
                        </div>

                        {{-- <div class="form-group">
                                    <label for="created_by">Penerima</label>
                                    <select name="created_by" class="form-control" required>
                                        @foreach ($users as $users)
                                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                        <div class="form-group" id="penerima-field">
                            <label for="users_jabatan">Penerima</label>
                            <select name="users_jabatan" class="form-control" required>
                                @foreach ($usersjabatans as $usersjabatan)
                                    <option value="{{ $usersjabatan->id }}">{{ $usersjabatan->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Surat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const penerimaField = document.getElementById('penerima-field');
        const fileInput = document.getElementById('file_surat');
        const fileLabel = document.getElementById('file_surat_label');

        function togglePenerimaField() {
            if (statusSelect.value === 'approve') {
                penerimaField.style.display = 'none';
            } else {
                penerimaField.style.display = 'block';
            }
        }

        statusSelect.addEventListener('change', togglePenerimaField);
        fileInput.addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Choose file';
            fileLabel.textContent = fileName;
        });

        // Initial call to set the correct state on page load
        togglePenerimaField();
    });
</script>
@endsection
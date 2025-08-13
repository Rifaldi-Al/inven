@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Surat Keluar</div>

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

                    <form method="POST" action="{{ route('surat_keluar.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="template">Gunakan Template Surat</label>
                            <select class="form-control" name="template" id="template" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $kode_surat->kode_surat }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_surat">Jenis Surat</label>
                            <select class="form-control" name="jenis_surat_id" id="jenis_surat" required>
                                <option value="">Pilih Jenis Surat</option>
                                @foreach ($jenis_surats as $jenis_surat)
                                    <option value="{{ $jenis_surat->id }}">{{ $jenis_surat->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="jenis_surat">Template Surat</label>
                            <a href="{{ asset('storage/template_surat/surat_dinas.rtf') }}" download>surat_dinas.rtf</a>
                        </div> --}}

                        <div class="form-group">
                            <label for="sifat_surat">Sifat Surat</label>
                            <select class="form-control" name="sifat_surat" id="sifat_surat" required>
                                <option value="penting">Penting</option>
                                <option value="biasa">biasa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" required>
                        </div>

                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                        </div>

                        <div class="form-group">
                            <label for="hal">Hal</label>
                            <input type="text" class="form-control" id="hal" name="hal" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="form-group" id="isiFormGroup">
                            <label for="isi">Isi</label>
                            <textarea class="form-control" name="isi" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group" id="isiFormGroup">
                            <label for="isi">Jabatan Penanda Tangan</label>
                            <select class="form-control" name="jabatan_id" id="jabatan_id" required>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->jabatanActive->id }}">{{ $jabatan->nama }} | {{ $jabatan->jabatanActive->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group" id="isiFormGroup">
                            <label for="isi">Tembusan</label>
                            <select class="form-control" name="jabatan_id" id="jabatan_id" required>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama }} | {{ $jabatan->jabatanActive->user->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group" id="fileFormGroup" style="display: none;">
                            <label for="file">File</label>
                            <input class="form-control" type="file" name="file" id="file">
                        </div>

                        {{-- <div class="form-group">
                            <label for="hal">Lampiran</label>

                            <div class="row">
                                <div class="col-1 text-center">
                                    <span>1</span>
                                </div>
                                <div class="col-5">
                                    <select class="form-control" name="pilih_tipe_lampiran" id="pilih_tipe_lampiran" required>
                                        <option value="1">Upload</option>
                                        <option value="2">Pilih File</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-5 file">
                                    <input class="form-control" type="file" name="file" id="upload_lampiran">
                                </div> --}}

                                {{-- <div class="col-5 file">
                                    <input class="form-control" type="file" name="file" id="upload_lampiran">
                                    <input class="form-control" type="text" name="file_surat_keluar" id="file_surat_keluar" >
                                </div>

                                <div class="col-1">
                                    <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the elements
        const isiFormGroup = document.getElementById('isiFormGroup');
        const fileFormGroup = document.getElementById('fileFormGroup');
        const templateSelect = document.getElementById('template');

        // Function to toggle between textarea and file input
        function toggleInputField() {
            if (templateSelect.value === '1') {
                // If "Tidak" is selected, hide file input and show textarea
                isiFormGroup.style.display = 'block';
                fileFormGroup.style.display = 'none';
            } else {
                // If "Ya" is selected, hide textarea and show file input
                isiFormGroup.style.display = 'none';
                fileFormGroup.style.display = 'block';
            }
        }

        // Initial call to toggleInputField to set the initial state
        toggleInputField();

        // Add event listener to template select to toggle input field
        templateSelect.addEventListener('change', toggleInputField);
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const isiFormGroup2 = document.getElementById('upload_lampiran');
        const templateSelect2 = document.getElementById('pilih_tipe_lampiran');
        const fileFormGroup2 = document.getElementById('file_surat_keluar');

        function toggleInputField2() {
            if (templateSelect2.value === '1') {
                isiFormGroup2.style.display = 'block';
                fileFormGroup2.style.display = 'none';
            } else {
                isiFormGroup2.style.display = 'none';
                fileFormGroup2.style.display = 'block';
            }
        }

        toggleInputField2();

        templateSelect2.addEventListener('change', toggleInputField2);
    });
</script> --}}

@endpush

@extends('layouts.dashboard.dashboard')

@push('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css"> --}}
<style>
    .small-column {
        width: 50px; /* Adjust the width as needed */
    }

    .edit-link {
        color: green !important; /* Change to green */
    }

    .delete-link {
        color: red !important; /* Change to red */
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Detail Surat Keluar</h1>
        </div>
        <div class="card-body">
            <div class="">
                <div class="row mb-5">
                    <div class="text-left col-6">
                        <a href="{{ route('surat_keluar.download', ['fileName' => $surat_keluar->file_name]) }}" class="btn btn-primary"><i class="fas fa-upload fa-sm text-white-50"> </i> Upload Surat</a>
                    </div>
                    <div class="text-right col-6">
                        <a href="{{ route('surat_keluar.download', ['fileName' => $surat_keluar->file_name]) }}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"> </i> Download Surat</a>
                        @if (Auth::user()->id == $surat_keluar->SuratKeluarUsers->first()->userJabatan->first()->user->id && $surat_keluar->SuratKeluarUsers->first()->status_baca == 'sudah-disetujui')
                            <a href="{{ route('surat_keluar.download', ['fileName' => $surat_keluar->file_name]) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o text-white-50"> </i> Download PDF Bersertifikat</a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->kodeSurat->kode_surat }}" readonly required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kode_surat">Perihal</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->perihal }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="kode_surat">Tanggal</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->tanggal }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="kode_surat">File</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->file_name }}" readonly required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="kode_surat">Tujuan</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->tujuan }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="kode_surat">Sifat Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->sifat_surat }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="kode_surat">Jenis Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->jenisSurat->nama }}" readonly required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_surat">Dibuat oleh</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $surat_keluar->createdBy->name }}" readonly required>
                        </div>
                    </div>

                    @if (Auth::user()->id == $surat_keluar->SuratKeluarUsers->first()->userJabatan->first()->user->id)
                        <div class="col-12 ">
                            <form method="POST" action="{{ route('surat_keluar_users.perbarui_status') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $surat_keluar->SuratKeluarUsers->first()->id }}">
                                <button class="btn btn-danger float-right" name="status" value="tolak">
                                    Tolak
                                </button>

                                <button class="btn btn-primary float-right mx-2" name="status" value="terima">
                                    Terima
                                </button>
                            </form>
                        </div>
                    @endif


                    <div class="col-12 my-5">
                        <h4>Daftar Tembusan</h4>
                        <table class="table">
                            <thead class="table-primary"">
                                <tr>
                                    <td>No</td>
                                    <td>Jabatan</td>
                                    <td>Nama</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surat_keluar->SuratKeluarUsers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->userJabatan->jabatan->nama }}</td>
                                        <td>{{ $item->userJabatan->user->name }}</td>
                                        <td>{{ $item->status_baca }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-12 mt-5">
                            <h4>Memo Revisi dan Perbaikan</h4>
                            <textarea name="memo" id="" cols="131" rows="10"></textarea>
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')

@endpush

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
            <h1 class="h3 mb-2 text-gray-800">Detail Surat Masuk</h1>
        </div>
        <div class="card-body">
            <div class="">
                <div class="text-right">
                    <a href="{{ route('surat_masuk.download', ['fileName' => basename($suratMasuk->file_surat)]) }}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"> </i> Download Surat</a>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="suratMasuk">Perihal</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->perihal }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="suratMasuk">Nama File</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->file_surat }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="suratMasuk">Tanggal</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->tanggal }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="suratMasuk">Pengirim</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->pengirim }}" readonly required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="suratMasuk">Status Disposisi</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->status }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="suratMasuk">Penerima</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{ $suratMasuk->user->name ?? 'N/A'}}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="suratMasuk">Jabatan Penerima</label>
                            <input type="text" class="form-control" id="suratMasuk" name="suratMasuk" value="{{  $suratMasuk->userJabatan->jabatan->nama }}" readonly required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Disposisi Table -->
     <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Detail Disposisi</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="disposisiTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">No</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th>Jabatan Penerima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($disposisis as $index => $disposisi)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $disposisi->tanggal }}</td>
                            <td>{{ $disposisi->alasan }}</td>
                            <td>{{ $suratMasuk->userJabatan->jabatan->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#disposisiTable').DataTable({
            "order": [[ 0, "asc" ]],
            "paging": true,
            "searching": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endpush
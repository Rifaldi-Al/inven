{{-- @extends('layouts.dashboard.dashboard') --}}
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
            <h1 class="h3 mb-2 text-gray-800">Surat Keluar</h1>
            <a href="{{ route('kode_surat.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Kode Surat</th>
                            <th class="">Jenis Surat</th>
                            <th class="">Hal</th>
                            <th class="">Status</th>
                            <th  class="small-column text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($kode_surats as $kode_surat)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $kode_surat->kode_surat }}</td>
                            <td >{{ $kode_surat->suratKeluar->jenisSurat->nama ?? 'Belum Dilengkapi' }}</td>
                            <td >{{ @$kode_surat->hal->nama }} | {{ @$kode_surat->hal->kode_hal }}</td>
                            <td >
                                @if ($kode_surat->suratKeluar)
                                    <button class="btn btn-primary">Menunggu Persetujuan</button>
                                @else
                                    <button class="btn btn-warning">Belum Dilengkapi</button>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($kode_surat->trashed())

                                @else
                                    @if ($kode_surat->suratKeluar)
                                        <a href="{{ route('surat_keluar.show', ['surat_keluar' => $kode_surat->suratKeluar->id]) }}" class="btn btn-sm btn-primary shadow-sm m-2">Detail Surat</a>
                                    @else
                                        <a href="{{ route('surat_keluar.buat', ['id' => $kode_surat->id]) }}" class="btn btn-sm btn-warning shadow-sm m-2">Lengkapi Surat</a>
                                    @endif
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if ($kode_surat->suratKeluar)

                                        @else
                                            <a class="dropdown-item edit-link" href="{{ route('kode_surat.edit', $kode_surat->id) }}">Edit</a>
                                        @endif
                                        <button type="button" class="dropdown-item delete-link" data-toggle="modal" data-target="#deleteConfirmationModal{{ $kode_surat->id }}">Delete</button>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $kode_surat->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus kode surat dan surat ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('kode_surat.destroy', $kode_surat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Confirmation Modal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/demo/datatables-demo.js')}}"></script>
@endpush

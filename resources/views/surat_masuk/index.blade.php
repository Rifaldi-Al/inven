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
        <!--Kondisi If Untuk Hide Berdasarkan Data Di Database, In This Case, Username User-->
        @if ($user->name == "Nama")    
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-2 text-gray-800">Surat Masuk</h1>
                <a href="{{ route('surat_masuk.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create</a>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Perihal</th>
                            <th class="">File Surat</th>
                            <th class="">Tanggal</th>
                            <th class="">Pengirim</th>
                            <th class="">Status</th>
                            <th class="">Nama Penerima</th>
                            <th class="">Jabatan Penerima</th>
                            <th  class="small-column text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($suratmasuks as $suratmasuk)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $suratmasuk->perihal }}</td>
                            <td >
                                @if($suratmasuk->file_surat)
                                    <a href="{{ Storage::url($suratmasuk->file_surat) }}" target="_blank">
                                        {{ basename($suratmasuk->file_surat) }}
                                    </a>
                                @else
                                    No File
                                @endif
                            <td >{{ $suratmasuk->tanggal }}</td>
                            <td >{{ $suratmasuk->pengirim }}</td>
                            <td >{{ $suratmasuk->status }}</td>
                            <td> {{ $suratmasuk->userJabatan->user->name ?? 'N/A' }}</td>
                            <td> {{ $suratmasuk->userJabatan->jabatan->nama }}</td>
                            <td class="text-center">
                                @if ($suratmasuk)
                                    <a href="{{ route('surat_masuk.show', ['surat_masuk' => $suratmasuk->id]) }}" class="btn btn-sm btn-primary shadow-sm m-2">Detail Surat</a>
                                @else
                                    <a href="{{ route('surat_masuk.buat', ['id' => $suratmasuk->id]) }}" class="btn btn-sm btn-warning shadow-sm m-2">Lengkapi Surat</a>
                                @endif

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item edit-link" href="{{ route('surat_masuk.edit', $suratmasuk->id) }}">Edit</a>
                                        <button type="button" class="dropdown-item delete-link" data-toggle="modal" data-target="#deleteConfirmationModal{{ $suratmasuk->id }}">Delete</button>
                                        @if ($suratmasuk->status !== 'approve')
                                            <a class="dropdown-item edit-link" href="{{ route('disposisi.buat', ['id' => $suratmasuk->id]) }}">Disposisi</a>
                                        @endif
                                    </div>
                                </div>
                        </td>
                    </tr>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmationModal{{ $suratmasuk->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus Surat Masuk Ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="{{ route('surat_masuk.destroy', $suratmasuk->id) }}" method="POST">
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

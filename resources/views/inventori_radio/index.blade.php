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
            <h1 class="h3 mb-2 text-gray-800">Inventori Radio Jaringan</h1>
            <a href="{{ route('inventori.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Nomor Seri</th>
                            <th class="">Tanggal Pemasangan</th>
                            <th class="">Waktu Pemakaian</th>
                            <th class="">Log Pengganti</th>
                            <th class="">Keterangan</th>
                            <th  class="small-column text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($inventoris as $inventori)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $inventori->nomor_seri }}</td>
                            <td >{{ $inventori->tanggal_pemasangan }}</td>
                            <td >{{ $inventori->waktu_pemakaian }}</td>
                            <td><a href="{{ route('log.index', ['nomor_seri' => $inventori->nomor_seri]) }}) " class="btn btn-sm btn-info"></i>Info</a></td>
                            <td >{{ $inventori->keterangan }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item edit-link" href="{{ route('inventori.edit', $inventori->id) }}">Edit</a>
                                        <button type="button" class="dropdown-item delete-link" data-toggle="modal" data-target="#deleteConfirmationModal{{ $inventori->id }}">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $inventori->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus Data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('inventori.destroy', $inventori->id) }}" method="POST">
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

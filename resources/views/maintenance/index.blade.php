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
            <h1 class="h3 mb-2 text-gray-800">Maintenance</h1>
            @if(auth()->user()->role =="user")
            <a href="{{ route('maintenance.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Create</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Aset</th>
                            <th class="">Pelapor</th>
                            <th class="">Tanggal Laporan</th>
                            <th class="">Status</th>
                            <th class="">Keterangan</th>
                            <th class="">Tanggal Perbaikan</th>
                            @if(auth()->user()->role =="admin")
                            <th class="">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $data->detailaset->aset->nama }}</td>
                            <td >{{ $data->Pegawai->name }}</td>
                            <td >{{ $data->tanggal_laporan }}</td>
                            <td >{{ $data->status }}</td>
                            <td >{{ $data->keterangan }}</td>
                            <td >{{ $data->tanggal_perbaikan }}</td>
                            @if(auth()->user()->role =="admin")
                            <td><a class="btn btn-sm btn-info" href="{{ route('maintenance.edit', $data->id) }}">Edit</a></td>
                            @endif
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('inventori.destroy', $data->id) }}" method="POST">
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

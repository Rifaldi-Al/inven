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
            <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
            <a href="{{ route('pegawai.create', ['kantor' => request('filter')]) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i> Create
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">NIK</th>
                            <th class="">Nama</th>
                            <th class="">Email</th>
                            <th class="">Jabatan</th>
                            <th class="">Kantor</th>
                            <th  class="small-column text-center">Aset</th>
                            <th  class="">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $pegawai->nik }}</td>
                            <td >{{ $pegawai->nama }}</td>
                            <td >{{ $pegawai->email }}</td>
                            <td >{{ $pegawai->jabatan }}</td>
                            <td >{{ $pegawai->kantor->nama }}</td>
                            <td><a href="{{ route('aset.index', ['filter' => $pegawai->nama]) }}" class="btn btn-sm btn-info">Detail</a></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-success" href="{{ route('pegawai.edit', $pegawai->id) }}"><i class="icon-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal{{ $pegawai->id }}"><i class="icon-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus bidang ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
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

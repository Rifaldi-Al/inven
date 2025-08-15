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
            <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
            @if(auth()->user()->role == "admin")
            <a href="{{ route('laporan.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Nomor Seri</th>
                            <th class="">Nama Aset</th>
                            <th class="">Jenis Aset</th>
                            <th class="">Nama Pemilik Aset</th>
                            <th class="">Tanggal Aset Masuk</th>
                            <th class="">Tanggal Aset Keluar</th>
                            <th class="">Keterangan Aset</th>
                            <th class="">Waktu Perbaikan</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($laporans as $laporan)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td >{{ $laporan->detailaset->nomor_seri }}</td>
                            <td >{{ $laporan->detailaset->aset->nama }}</td>
                            <td >Hardware</td>
                            <td >{{ $laporan->detailaset->pegawai->nama}}</td>
                            <td >{{ $laporan->masuk}} </td>
                            <td >{{ $laporan->keluar}}</td>
                            <td >{{ $laporan->keterangan}}</td>
                            <td >{{ $laporan->waktu_pengerjaan }}</td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $laporan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                                        <form action="{{ route('log.destroy', $laporan->id) }}" method="POST">
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

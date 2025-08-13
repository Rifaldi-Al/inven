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

    .inventaris-link {
        color: rgb(95, 95, 255) !important; /* Change to green */
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
            <h1 class="h3 mb-2 text-gray-800">Daftar Aset Hardware</h1>
            <a href="{{ route('aset.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="small-column text-center">NO</th>
                            <th class="">Pemilik</th>
                            <th class="">Nama</th>
                            <th class="">Merk</th>
                            <th class="">Spesifikasi</th>
                            <th class="">Nomor Seri</th>
                            <th class="">Tanggal Pembelian</th>
                            <th class="">Kategori</th>
                            <th class="">Status</th>
                            <th class="">Gambar</th>
                            <th  class="small-column text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        @foreach($asets as $aset)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $aset->pegawai->nama ?? 'N/A' }}</td>
                            <td>{{ $aset->aset->nama ?? 'N/A' }}</td>
                            <td>{{ $aset->aset->merk ?? 'N/A' }}</td>
                            <td>{{ $aset->aset->spesifikasi ?? 'N/A' }}</td>
                            <td>{{ $aset->nomor_seri }}</td>
                            <td>{{ $aset->tanggal_beli ?? 'N/A' }}</td> <!-- Fixed field name to match your DB -->
                            <td>{{ $aset->aset->kategori->nama ?? 'N/A' }}</td>
                            <td>{{ $aset->status }}</td>
                            <td style="width: 80px; height: 80px; padding: 4px;">
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 1px solid #eee; border-radius: 4px;">
                                    <img src="{{ asset($aset->image ?? 'path/to/default/image.jpg') }}"
                                        alt="Gambar Aset"
                                        style="object-fit: contain; max-width: 100%; max-height: 100%;">
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item edit-link" href="{{ route('aset.edit', $aset->id) }}">Edit</a>
                                        <a class="dropdown-item inventaris-link" href="{{ route('aset.inventaris', $aset->id) }}">Inventaris</a>
                                        <button type="button" class="dropdown-item delete-link" data-toggle="modal" data-target="#deleteConfirmationModal{{ $aset->id }}">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $aset->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus Aset ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('aset.destroy', $aset->id) }}" method="POST">
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

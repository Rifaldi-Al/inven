@extends('layouts.dashboard.dashboard')

@push('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    .small-column {
        width: 50px;
    }
    .edit-link {
        color: green !important;
    }
    .delete-link {
        color: red !important;
    }
    /* Ensure tables don't overflow their containers */
    .table-responsive {
        overflow-x: auto;
    }
    /* Equal height cards */
    .equal-height {
        display: flex;
        flex-wrap: wrap;
    }
    .equal-height > .col-md-6 {
        display: flex;
    }
    .equal-height .card {
        flex: 1;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <!-- Main Kategori Aset Card (Full Width) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Kategori Aset</h1>
            <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah
            </a>
        </div>
    </div>

    <!-- Side-by-Side Tables -->
    <div class="row equal-height">
        <!-- Hardware Table (Left Column) -->
        <div class="col-md-6">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 text-gray-800">Kategori Aset Hardware</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="hardwareTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="small-column text-center">NO</th>
                                    <th class="">Kategori</th>
                                    <th class="">Kode</th>
                                    <th class="">Aset</th>
                                    <th class="small-column text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($asets as $aset)
                                @if($aset->kategori_alat == 'Hardware') <!-- Add your condition here -->
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $aset->nama }}</td>
                                    <td>{{ $aset->kode}}</td>
                                    <td><a href="{{ route('aset.index', ['filter' => $aset->nama]) }}" class="btn btn-sm btn-info">Detail</a></td>

                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a class="btn btn-sm btn-success" href="{{ route('kategori.edit', $aset->id) }}">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal{{ $aset->id }}">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jaringan Table (Right Column) -->
        <div class="col-md-6">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 text-gray-800">Kategori Aset Jaringan</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="jaringanTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="small-column text-center">NO</th>
                                    <th class="">Kategori</th>
                                    <th class="">Kode</th>
                                    <th class="">Aset</th>
                                    <th class="small-column text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asets as $aset)
                                @php
                                    $i = 1;
                                @endphp
                                @if($aset->kategori_alat == 'Jaringan') <!-- Add your condition here -->
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $aset->nama }}</td>
                                    <td>{{ $aset->kode}}</td>
                                    <td><a href="{{ route('aset.index', ['filter' => $aset->nama]) }}" class="btn btn-sm btn-info">Detail</a></td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a class="btn btn-sm btn-success" href="{{ route('kategori.edit', $aset->id) }}">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal{{ $aset->id }}">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Initialize all DataTables with different IDs
        $('#mainDataTable').DataTable();
        $('#hardwareTable').DataTable();
        $('#jaringanTable').DataTable();
    });
</script>
@endpush

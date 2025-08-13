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

    /* Grid Layout for Data */
    .data-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Three columns */
        gap: 20px; /* Space between cards */
        margin-top: 20px;
    }

    /* Data Card */
    .data-card {
        padding: 15px;
        background-color: #f8f9fc;
        border: 1px solid #ddd;
        border-radius: 10px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Floating Insert Button */
    .floating-button {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #007bff;
        color: #fff;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        z-index: 1000;
    }

    .floating-button:hover {
        opacity: 0.8;
        transition: 0.3s ease-in-out;
        background-color: #101112;
    }

    .create-button {
    bottom: 20px; /* Lower position */
    }

    .edit-button {
        bottom: 80px; /* Higher position */
        background-color: #28a745; /* Green for edit */
    }

    /* Red Delete Button */
    .delete-link {
        border: 0;
        background-color: transparent;
    }

</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
        </div>
    </div>

    <!-- Data Grid -->
    <div class="data-grid">
        @foreach ($kantors as $kantor)
        <div class="data-card">
            <a href="{{ route('pegawai.index', ['filter' => $kantor->nama]) }}">
                {{ $kantor->nama }}
            </a>
            <!-- Edit Button inside each card -->
            <a href="{{ route('kantor.edit', $kantor->id) }}" class="edit-link">
                ✎
            </a>
            <!-- Delete Button (With Confirmation) -->
        <form action="{{ route('kantor.destroy', $kantor->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-link" onclick="return confirm('Are you sure you want to delete this?');">
                🗑
            </button>
        </form>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $kantors->links() }}
    </div>

    <!-- Floating Insert Button -->
    <div class="floating-button create-button" onclick="window.location.href='{{ route('kantor.create') }}'">
        +
    </div>
</div>
@endsection


@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/demo/datatables-demo.js')}}"></script>
@endpush

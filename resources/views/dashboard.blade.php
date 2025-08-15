{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.dashboard.dashboard')
{{-- @extends('layouts.dashboard.dashboard') --}}
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <h5 class="p-5 text-center">Selamat Datang {{ Auth::user()->name }} !</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Data Pegawai</div>

                <div class="card-body text-center">
                    <h2>{{ \App\Models\Pegawai::count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Jumlah Radio</div>

                <div class="card-body text-center">
                    <h2>{{ \App\Models\Inventori::count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Aset Pegawai</div>

                <div class="card-body text-center">
                    <h2>{{ \App\Models\Aset::count() }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


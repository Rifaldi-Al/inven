@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP:</label>
                            <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak:</label>
                            <input type="number" class="form-control" id="kontak" name="kontak" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group">
                            <label for="pegawai">Pegawai:</label>
                            <select class="form-control" name="pegawai" id="pegawai">
                                <option class="form-control" value="0">Tidak</option>
                                <option class="form-control" value="1">Ya</option>
                            </select>
                        </div>

                        <div class="form-group" id="namaPegawaiField" style="display: none;">
                            <label for="namaPegawai">Nama Pegawai:</label>
                            <input type="text" class="form-control" id="namaPegawai" name="namaPegawai">
                        </div>

                        <div class="form-group">
                            <label for="role">rolee:</label>
                            <select class="form-control" name="role" id="role">
                                @foreach($roles as $role)
                                  <option class="form-control" value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button id="openModalBtn" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#myModal" type="button">Tambah Jabatan</button>
                        </div>
                        <table id="userTable" class="table" border="1px">
                            <thead class="table-primary">
                                <tr>
                                    <th>
                                        Jabatan
                                    </th>
                                    <th>
                                        Periode Awal
                                    </th>
                                    <th>
                                        Periode Akhir
                                    </th>
                                    {{-- <th>
                                        Aksi
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Direktur
                                    </td>
                                    <td>
                                        2021
                                    </td>
                                    <td>
                                        2024
                                    </td>
                                    {{-- <td>
                                        <button id="" class="btn btn-primary mb-3 float-right" type="button"><i class="fa fa-times"></i></button>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>


                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">Pilih Jabatan</option>
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="p_awal">Periode Awal</label>
                        <input type="date" class="form-control" id="p_awal" name="p_awal" required>
                    </div>
                    <div class="form-group">
                        <label for="p_akhir">Periode Akhir</label>
                        <input type="date" class="form-control" id="p_akhir" name="p_akhir" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push("js")

<script>
    $(document).ready(function() {
        const modal = $("#myModal");
        const openModalBtn = $("#openModalBtn");
        const closeModalBtn = $(".close");
        const userForm = $("#userForm");
        const userTable = $("#userTable tbody");

        openModalBtn.click(function() {
            modal.show();
        });

        closeModalBtn.click(function() {
            modal.hide();
        });

        $(window).click(function(event) {
            if ($(event.target).is(modal)) {
                modal.hide();
            }
        });

        userForm.submit(function(event) {
            event.preventDefault();

            const name = $("#jabatan").val();
            const p_awal = $("#p_awal").val();
            const p_akhir = $("#p_akhir").val();

            const newRow = `<tr>
                                <td>${name}</td>
                                <td>${p_awal}</td>
                                <td>${p_akhir}</td>
                            </tr>`;
            userTable.append(newRow);

            modal.hide();
            userForm[0].reset();

            // Hide the modal backdrop
            $(".modal-backdrop").remove();
        });

         // Ensure modal closes when dismissed
        modal.on("hidden.bs.modal", function () {
            userForm[0].reset();
        });
    });
</script>

<script>
    document.getElementById('pegawai').addEventListener('change', function() {
        var namaPegawaiField = document.getElementById('namaPegawaiField');
        if (this.value == '1') {
            namaPegawaiField.style.display = 'block';
        } else {
            namaPegawaiField.style.display = 'none';
        }
    });
</script>
@endpush

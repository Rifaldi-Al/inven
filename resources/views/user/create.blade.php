@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah User</div>

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
                            <label for="role">Role:</label>
                            <select class="form-control" name="role" id="role">
                                  <option class="form-control" value="admin">Admin</option>
                                  <option class="form-control" value="user">User</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
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

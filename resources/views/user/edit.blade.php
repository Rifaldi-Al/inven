@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

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

                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
                            <label for="nip">NIP:</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}">
                            <label for="kontak">Kontak:</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak', $user->kontak) }}">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                            <label for="email">Role:</label>
                            <select name="role" class="form-control" id="role">
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

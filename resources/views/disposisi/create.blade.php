@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Disposisi</div>

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

                    <form method="POST" action="{{ route('disposisi.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="alasan">Catatan<span style="color: red">* <i style="text-size:11px;">(Opsional)</i> </span></label>
                            <textarea name="alasan" id="" cols="68" rows="10"></textarea>
                        </div>

                        <input type="hidden" name="surat_masuk_id" value = "{{ $id }}">

                        <div class="form-group">
                            <label for="users_jabatan_id">Penerima</label>
                            <select name="users_jabatan_id" class="form-control" required>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

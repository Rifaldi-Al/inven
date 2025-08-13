@extends('layouts.dashboard.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kode Surat</div>

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

                    <form method="POST" action="{{ route('bidang.update', $kode_surat->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="{{ $kode_surat->kode_surat }}" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="hal">Hal</label>
                            <select class="form-control" name="hal_id" id="hal" required>
                                <option value="">Pilih Hal</option>
                                @foreach ($hals as $hal)
                                    <option value="{{ $hal->id }}" data-kode-hal="{{ $hal->kode_hal }}">{{ $hal->nama }} | {{ $hal->kode_hal }}</option>
                                @endforeach
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

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#hal').change(function() {
                var selectedOption = $(this).find('option:selected');
                var kodeHal = selectedOption.data('kode-hal');
                var currentYear = new Date().getFullYear();
                var jabatanUserKode = 'PL21';
                var nomorSurat = '{{ $nomor_surat_formatted }}';
                if (selectedOption && selectedOption != '') {
                    $('#kode_surat').val(nomorSurat + '/' + jabatanUserKode + '/' + kodeHal + "/" + currentYear);
                } else {
                    $('#kode_surat').val("");
                }
            });
        });
    </script>
@endpush

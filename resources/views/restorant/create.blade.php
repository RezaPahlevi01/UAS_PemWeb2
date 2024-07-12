@extends('layouts.app')

@section('content')
<!-- CSS Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .btn-tambah {
            background-color: #a276f1;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
    }
    .btn-batal {
            background-color: #ffc343;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header color:">Tambah Restoran Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('restorant.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Restoran</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code_alternatif">Kode alternatif</label>
                            <input type="text" class="form-control @error('code_alternatif') is-invalid @enderror" id="code_alternatif" name="code_alternatif" value="{{ old('code_alternatif') }}" required>
                            @error('code_alternatif')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-tambah">Simpan</button>
                        <a href="{{ route('restorant.index') }}" class="btn btn-batal">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- CSS Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Restoran</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restorant.update', $restorant->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Id Restoran</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="id" name="id" value="{{ old('id', $restorant->id) }}" required>
                            @error('id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Restoran</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $restorant->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code_alternatif">Kode alternatif</label>
                            <input type="text" class="form-control @error('code_alternatif') is-invalid @enderror" id="code_alternatif" name="code_alternatif" value="{{ old('code_alternatif', $restorant->code_alternatif) }}" required>
                            @error('code_alternatif')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                </div>


                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('restorant.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

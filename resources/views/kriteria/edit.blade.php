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
        <h1>Edit Kriteria</h1>

        <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code_kriteria">Kode Kriteria</label>
                <input type="text" class="form-control" id="code_kriteria" name="code_kriteria" value="{{ $kriteria->code_kriteria }}">
            </div>

            <div class="form-group">
                <label for="nama">Nama Kriteria</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kriteria->nama }}">
            </div>

            <div class="form-group">
                            <label for="harga">Kategori</label>    
                            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                <option value="cost" {{ old('kategori') == '1' ? 'selected' : '' }}>Cost</option>
                                <option value="benefit" {{ old('kategori') == '2' ? 'selected' : '' }}>Benefit</option>
                            </select>
                            @error('kategori')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
            </div>
            <div class="form-group">
                            <label for="harga">Bobot</label>    
                            <select class="form-control @error('harga') is-invalid @enderror" id="bobot" name="bobot">
                                <option value="1" {{ old('bobot') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('bobot') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('bobot') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('bobot') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('bobot') == '5' ? 'selected' : '' }}>5</option>
                            </select>
                            @error('bobot')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

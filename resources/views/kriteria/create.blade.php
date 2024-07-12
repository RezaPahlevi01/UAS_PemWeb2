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
                <div class="card-header">Tambah Kriteria Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kriteria.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="code_kriteria">Kode Kriteria</label>
                            <input type="text" class="form-control @error('code_kriteria') is-invalid @enderror" id="code_kriteria" name="code_kriteria" value="{{ old('code_kriteria') }}" required>
                            @error('code_kriteria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label for="nama">Nama Kriteria</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        

                            <label for="label">Kategori</label>    
                                    <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                        <option value="">Pilih kategori</option>
                                        <option value="cost" {{ old('kategori') == 'cost' ? 'selected' : '' }}>Cost</option>
                                        <option value="benefit" {{ old('kategori') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                    </select>
                                    @error('kategori')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                            <label for="fasilitas">Bobot</label>    
                            <select class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required>
                                <option value="">Pilih bobot</option>
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
                        <button type="submit" class="btn btn-tambah">Simpan</button>
                        <a href="{{ route('restorant.index') }}" class="btn btn-batal">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

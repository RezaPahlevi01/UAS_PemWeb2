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
                <label for="nama">Nama Kriteria</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kriteria->nama }}">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori Kriteria</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $kriteria->kategori }}">
            </div>

            <div class="form-group">
                <label for="bobot">Bobot Kriteria</label>
                <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

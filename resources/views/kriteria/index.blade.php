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
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Kriteria</h1>
                <div class="text-right mb-3">
                    <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>
                            <th>Kategori Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                            <tr>
                                <td>{{ $kriteria->nama }}</td>
                                <td>{{ $kriteria->kategori }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>
                                    <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

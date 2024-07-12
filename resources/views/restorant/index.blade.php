@extends('layouts.app')

@section('content')
<!-- CSS Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery terlebih dahulu, kemudian Popper.js, lalu Bootstrap JS -->
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
    .btn-hitung {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-bottom: 10px;
        margin-left: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Alternatif</h1>
            <div class="text-right mb-3">
                <a href="{{ route('restorant.create') }}" class="btn btn-tambah">Tambah Restoran</a>
                <form action="{{ route('topsis.calculate') }}" method="POST" style="display: inline-block;">
                    @csrf
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Kode alternatif</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restorants as $restorant)
                        <tr>
                            <td style="text-align: center;">{{ $restorant->nama }}</td>
                            <td style="text-align: center;">{{ $restorant->code_alternatif }}</td>
                            <td>
                                <a href="{{ route('restorant.edit', $restorant->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('restorant.destroy', $restorant->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

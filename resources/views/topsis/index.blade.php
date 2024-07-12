@extends('layouts.app')

@section('title', 'TOPSIS')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h1 class="mb-4">TOPSIS</h1>
    <form action="{{ route('topsis.calculate') }}" method="POST">
        @csrf
        @foreach ($kriterias as $kriteria)
            <div class="form-group">
                <h3>{{ $kriteria->nama }}</h3>
                @foreach ($restorants as $restorant)
                    <label>{{ $restorant->nama }}</label>
                    <input type="number" class="form-control mb-2" name="data[{{ $kriteria->id }}][{{ $restorant->id }}]" required>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>
</div>
@endsection

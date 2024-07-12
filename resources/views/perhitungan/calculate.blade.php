@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery terlebih dahulu, kemudian Popper.js, lalu Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Perhitungan TOPSIS') }}</h1>

    <!-- Matriks Normalisasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Matriks Normalisasi</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->nama}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matrixNormalisasi as $altId => $nilai)
                            <tr>
                                <td>{{ $restorants->find($altId)->nama}}</td>
                                @foreach ($kriterias as $kriteria)
                                    <td>{{ number_format($nilai[$kriteria->id], 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Matriks Normalisasi Terbobot -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Matriks Normalisasi Terbobot</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->nama}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matrixTerbobot as $altId => $nilai)
                            <tr>
                                <td>{{ $restorants->find($altId)->nama}}</td>
                                @foreach ($kriterias as $kriteria)
                                    <td>{{ number_format($nilai[$kriteria->id], 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Solusi Ideal Positif dan Negatif -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Solusi Ideal Positif</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($solusiIdealPositif as $kriteriaId => $nilai)
                                <td>{{ number_format($nilai, 4) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Solusi Ideal Negatif</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($solusiIdealNegatif as $kriteriaId => $nilai)
                                <td>{{ number_format($nilai, 4) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Jarak Solusi Ideal Positif dan Negatif -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Jarak Solusi Ideal Positif</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jarakPositif as $altId => $nilai)
                            <tr>
                                <td>{{ $restorants->find($altId)->nama}}</td>
                                @foreach ($kriterias as $kriteria)
                                    <td>{{ number_format($nilai, 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Jarak Solusi Ideal Negatif</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jarakNegatif as $altId => $nilai)
                            <tr>
                                <td>{{ $restorants->find($altId)->nama}}</td>
                                @foreach ($kriterias as $kriteria)
                                    <td>{{ number_format($nilai, 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Nilai Preferensi dan Perankingan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Nilai Preferensi dan Perankingan</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Alternatif</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rank = 1; @endphp
                        @foreach ($nilaiPreferensi as $altId => $nilai)
                            <tr>
                                <td>{{ $rank++ }}</td>
                                <td>{{ $restorants->find($altId)->nama}}</td>
                                <td>{{ number_format($nilai, 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

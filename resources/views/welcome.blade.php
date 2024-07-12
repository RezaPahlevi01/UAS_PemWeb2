@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
    .tampilan {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 30px;
    }
    .tampilan:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);

    }
    .tampilan h1 {
        color: #343a40;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .tampilan h2 {
        color: #6c757d;
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .tampilan p {
        color: #495057;
        font-size: 1rem;
        line-height: 1.8;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="tampilan col-md-8 text-center">
            <h1>APA ITU METODE TOPSIS?</h1>
            <h2>Metode TOPSIS adalah salah satu metode pengambilan keputusan multikriteria yang pertama kali diperkenalkan oleh Yoon dan Hwang pada tahun 1981. Metode ini banyak digunakan untuk pengambilan keputusan yang mempunyai multikriteria atau kriteria yang banyak.</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="tampilan col-md-8 text-center">
            <h1>Deskripsi PilRes</h1>
            <h2>Aplikasi Sistem Pendukung Keputusan Pemilihan Resto di Tegal</h2>
            <p>Aplikasi Sistem Pendukung Keputusan (SPK) ini dibuat untuk membantu pengguna dalam memilih restoran terbaik di Tegal berdasarkan kriteria-kriteria seperti harga, jarak, fasilitas, kebersihan, dan lainnya. Pengguna dapat dengan mudah memasukkan kriteria-kriteria tersebut dan aplikasi akan memberikan rekomendasi restoran terbaik berdasarkan metode TOPSIS.</p>
        </div>
    </div>
</div>
@endsection

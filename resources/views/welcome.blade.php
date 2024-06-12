@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="d-flex justify-content-center">
                        <h1> WELCOME</h1>
                    </div>

                    <div class="d-flex justify-content-center">
                        <h2>You are logged in!</h2>
                    </div>
            </div>
        </div>
    </div>
@endsection

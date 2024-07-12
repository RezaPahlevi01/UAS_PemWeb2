<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #388da8, #AFD1DC);
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: transform 0.3s ease, box-shadow 0.3s ease;

        }
        .sidebar a:hover {
            background-color: #ffffff;
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        .dropdown-menu a {
            color: black;
        }
        .navbar-brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .navbar-brand-icon i {
            margin-right: 10px;
            font-size: 80px;
            
        }

    </style>
</head>
<body>
    <div class="sidebar">
            <div class="navbar-brand-icon">
                <i class="fas fa-user"></i>
            </div>
            <p style="text-align: center;">{{ Auth::user()->name }}</p>
            <a class="navbar-brand" href="{{ url('/welcome') }}">PilRes</a>
            <a class="nav-link" href="{{ url('restorant/') }}">Daftar Alternatif</a>
            <a class="nav-link" href="{{ url('kriteria/') }}">Daftar Kriteria</a>
            <a class="nav-link" href="{{ url('penilaian/') }}">Penilain</a>
            <a class="nav-link" href="{{ route('perhitungan.topsis') }}">Perhitungan</a>
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>


        <div class="mt-auto">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
        </div>
    </div>

    <div class="main-content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .btn-custom-red {
            background-color: #a276f1;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-custom-red:hover {
            background-color: #fc74b2; /* Merah lebih gelap saat hover */
        }
        
        .login-container {
            display: flex;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1300px;
            width: 100%;
        }
        .login-image {
            flex: 1;
            background: url('/img/regist-img2.jpg') no-repeat center center;
            background-size: contain;
        }
        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form h2 {
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-login {
            background-color: #388da8;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 200px;
        }
        .btn-login:hover {
            background-color: #ffdc8f;
        }
        .form-check-label, .forgot-password {
            font-size: 14px;
        }
        .forgot-password {
            float: right;
        }
    </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Sign up</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group justify-content-center row mb-0">
                    <div>
                        <button type="submit" class="btn btn-login">
                            {{ __('Register') }}
                        </button>
                        <!-- <a href="{{ route('login') }}" class="btn btn-custom-red">Login</a> -->
                    </div>
                    
             </div>
                <div class="text-center mt-4">
                    <p>or regist with</p>
                    <a href="{{ route('auth.google') }}">
                    <i class="bi bi-google" style="font-size: 30px; margin: 5px; background: linear-gradient(45deg, #ffb256, #feead1); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                    </a>
                </div>
                <div class="text-center mt-4">
                    <p>Have an account?<a href="{{ route('login') }}">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

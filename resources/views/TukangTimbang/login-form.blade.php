<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #b2f0c0 0%, #ffffff 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            max-width: 420px;
        }

        .login-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(90deg, #3ca374, #2e7d57);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
        }

        .card-header p {
            margin: 0.5rem 0 0;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #c7e6d0;
            background-color: #f6fff8;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3ca374;
            box-shadow: 0 0 8px rgba(60, 163, 116, 0.4);
            background-color: #ffffff;
        }

        .btn-primary {
            border-radius: 10px;
            background-color: #3ca374;
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2e7d57;
            transform: translateY(-2px);
        }

        .input-group-text {
            background: #f6fff8;
            border-radius: 0 10px 10px 0;
            border-left: none;
            cursor: pointer;
            color: #3ca374;
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding: 1rem;
        }

        @media(max-width:576px) {
            .login-card {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-10">
                <div class="card login-card">
                    <div class="card-header">
                        <h3>Welcome Back</h3>
                        <p>Please login to your account</p>
                    </div>

                    <div class="card-body">
                        {{-- ✅ Tampilkan pesan validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger py-2">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger text-center py-2">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success text-center py-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('auth.login') }}" method="POST" autocomplete="on">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter your username" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Enter your password" required>
                                    <span class="input-group-text" id="togglePassword"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            <div class="d-grid mb-2">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer sekarang kosong -->
                    <div class="card-footer">
                        <p class="mb-0">Belum punya akun?
                            <a href="{{ route('auth.registerForm') }}" class="text-success fw-semibold">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle show/hide password
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

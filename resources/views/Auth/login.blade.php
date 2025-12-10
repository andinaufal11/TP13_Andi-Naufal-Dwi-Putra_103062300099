<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NauAdmin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Gradient yang sama dengan tombol Dashboard agar konsisten */
            background: linear-gradient(135deg, #4318FF 0%, #7B4DFF 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .btn-primary {
            background: #4318FF;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #3410c9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 24, 255, 0.4);
        }

        .form-floating > label {
            padding-left: 20px;
        }
        
        .form-control {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding-left: 20px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(67, 24, 255, 0.1);
            border-color: #4318FF;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-shop fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Welcome Back!</h3>
                    <p class="text-muted small">Silakan login untuk mengelola toko.</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center p-2 small" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-2"></i> {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center p-2 small" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        <label for="email" class="text-muted">Email Address</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password" class="text-muted">Password</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Login Sekarang <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    <div class="text-center">
                        <span class="text-muted small">Belum punya akun?</span>
                        <a href="/register" class="text-primary fw-bold small text-decoration-none ms-1">Daftar disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
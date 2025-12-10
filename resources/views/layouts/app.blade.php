<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Custom CSS untuk Tampilan Premium */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fe; /* Warna background soft blue-gray */
            color: #333;
        }

        /* Navbar dengan efek blur (Glassmorphism) */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: #4318FF !important; /* Warna Indigo Modern */
            font-size: 1.5rem;
        }

        /* Card Modern */
        .card {
            border: none;
            border-radius: 20px; /* Sudut lebih bulat */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
            transition: all 0.3s ease;
            background: white;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px); /* Efek naik saat di-hover */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.07);
        }

        /* Tombol dengan Gradient */
        .btn-primary {
            background: linear-gradient(45deg, #4318FF, #6610f2);
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(67, 24, 255, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #3a14e0, #520dc2);
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(67, 24, 255, 0.4);
        }

        .btn-danger {
            border-radius: 12px;
            padding: 8px 16px;
        }

        /* Alert Modern */
        .alert {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="bi bi-shop me-2"></i>Toko Kita
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active fw-bold text-primary' : '' }}" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active fw-bold text-primary' : '' }}" href="/products">Produk</a>
                    </li>
                    <li class="nav-item ps-3 border-start">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-light rounded-circle p-2 text-primary fw-bold">
                                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                            </div>
                            <span class="fw-medium small">{{ Auth::user()->name ?? 'Guest' }}</span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger btn-sm text-white ms-2" href="{{ route('logout') }}" style="box-shadow: none; padding: 6px 15px;">
                            <i class="bi bi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 100px;"></div>

    <div class="container pb-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <strong>Berhasil!</strong> {{ $message }}
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
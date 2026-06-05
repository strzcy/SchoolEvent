<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolEvent</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* IMPORTANT: Biar footer bisa nempel di bawah */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-image: url('https://i.imgpeek.com/zqdFLE2waclA');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        /* Overlay gelap biar teks terbaca */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
        
        /* Wrapper biar footer bisa flex */
        .app-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Konten utama bakal dorong footer ke bawah */
        .main-content {
            flex: 1;
        }
        
        .navbar {
            background: #173648;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        /* Navbar brand dan link warna putih biar keliatan */
        .navbar-brand, .nav-link {
            color: white !important;
        }
        
        .navbar-brand:hover, .nav-link:hover {
            color: #ddd !important;
        }
        
        /* Tombol dropdown di navbar */
        .dropdown-toggle, .dropdown-item {
            color: #333;
        }
        
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            transform: scale(1.05);
        }
        
        .event-poster {
            height: 250px;
            object-fit: cover;
        }
        
        .alert {
            border-radius: 10px;
        }
        
        /* Footer selalu di bawah */
        footer {
            background: rgba(0,0,0,0.8);
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
            width: 100%;
        }
        
        /* Judul putih biar kontras */
        .text-white-custom {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .text-white-50-custom {
            color: rgba(255,255,255,0.9);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        footer {
            background-color: #173648;
        }

        
    </style>
</head>
<body>
    <div class="app-wrapper">
        @include('layouts.navigation')
        
        <main class="main-content py-4">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
        
        <footer class="text-center">
            <p class="mb-0">&copy; 2026 Dessi Puspita Sari - All rights reserved</p>
        </footer>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
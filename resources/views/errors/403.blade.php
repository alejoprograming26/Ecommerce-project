@php
    $ajuste = \App\Models\Ajuste::first();
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $ajuste ? $ajuste->nombre : env('APP_NAME', 'Ecommerce') }} - 403 Acceso Denegado</title>
    @if (isset($ajuste) && $ajuste->logo)
        <link href="{{ asset('storage/' . $ajuste->logo) }}" rel="icon">
        <link href="{{ asset('storage/' . $ajuste->logo) }}" rel="apple-touch-icon">
    @else
        <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    @endif

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f6f9fc;
            color: #444444;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }
        .error-container {
            text-align: center;
            padding: 4rem 3rem;
            background: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            max-width: 650px;
            width: 90%;
            position: relative;
            z-index: 10;
        }
        .error-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #dc3545, #fd7e14);
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
        }
        .error-code {
            font-family: 'Montserrat', sans-serif;
            font-size: 8rem;
            font-weight: 800;
            color: #f1f3f5;
            line-height: 1;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
            letter-spacing: -2px;
        }
        .error-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-top: -3.5rem;
            position: relative;
            z-index: 2;
            background: #ffffff;
            border-radius: 50%;
            display: inline-block;
            padding: 0.5rem;
            box-shadow: 0 10px 20px rgba(220, 53, 69, 0.15);
        }
        .error-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            margin-top: 1.5rem;
            color: #212529;
            letter-spacing: -0.5px;
        }
        .error-message {
            font-size: 1.15rem;
            color: #6c757d;
            margin-top: 1rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }
        .btn-custom {
            padding: 0.8rem 2.5rem;
            font-weight: 600;
            border-radius: 50rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0.5rem;
        }
        .btn-custom-primary {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border: none;
            color: white;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
        }
        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
            color: white;
            background: linear-gradient(135deg, #0b5ed7, #0a53be);
        }
        .btn-custom-secondary {
            background: #ffffff;
            border: 2px solid #dee2e6;
            color: #495057;
        }
        .btn-custom-secondary:hover {
            background: #f8f9fa;
            border-color: #adb5bd;
            color: #212529;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        /* Animated Background Pattern */
        .bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: radial-gradient(#dee2e6 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.5;
            z-index: 0;
        }
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            margin: 0;
            padding: 0;
        }
        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(220, 53, 69, 0.05);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }
        .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .circles li:nth-child(5) { left: 65%; width: 40px; height: 40px; animation-delay: 0s; }
        .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .circles li:nth-child(8) { left: 50%; width: 35px; height: 35px; animation-delay: 15s; animation-duration: 45s; }
        .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .circles li:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }
        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }
    </style>
</head>
<body>

    <div class="bg-pattern"></div>
    <ul class="circles">
        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
    </ul>

    <div class="error-container">
        <h1 class="error-code">403</h1>
        <div class="error-icon">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h2 class="error-title">Acceso Denegado</h2>
        <p class="error-message">
            Lo sentimos, no tienes los permisos necesarios para acceder a esta página o realizar esta acción. Por favor, verifica tus credenciales o contacta al administrador.
        </p>
        <div>
            <a href="{{ url('/') }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-house-door-fill me-2 mb-1"></i> Ir al Inicio
            </a>
            <a href="javascript:history.back()" class="btn-custom btn-custom-secondary">
                <i class="bi bi-arrow-left-circle-fill me-2 mb-1"></i> Volver
            </a>
        </div>
    </div>

</body>
</html>

@extends('layouts.admin')

@section('content')
    <style>
        .card-hover {
            transition: all 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
            cursor: pointer;
        }
        /* Ajuste para que el enlace cubra todo el card sin subrayar el texto */
        .text-decoration-none-custom {
            text-decoration: none !important;
            color: inherit;
        }
    </style>

    <div class="row mb-4 align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3 class="mb-0">Bienvenido: <b class="text-primary">{{ Auth::user()->name }}</b></h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Rol del Usuario</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.roles.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon purple me-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; border-radius: 0.5rem;">
                             <i class="" style="font-size: 2rem;"><i class="bi bi-shield-check fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Roles Registrados</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_roles }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.usuarios.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover"> 
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon blue me-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="" style="font-size: 2rem;"><i class="bi bi-person-fill fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Usuarios Registrados</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_usuarios }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.categorias.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon green me-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class=""><i class="bi bi-handbag-fill fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Categorías Registradas</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_categorias }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="#" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon red me-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="iconly-boldBookmark text-white" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Saved Post</h6>
                            <h3 class="fw-bold mb-0 ">112</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
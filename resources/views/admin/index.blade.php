@extends('layouts.admin')

@section('content')
    <style>
        .card-hover {
            transition: all 0.3s ease-in-out;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Auth::user()->roles->pluck('name')->implode(', ') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        @can('Ver Listado de Roles')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.roles.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon purple me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="" style="font-size: 2rem;"><i
                                    class="bi bi-shield-check fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Roles Registrados</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_roles }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('Ver Listado de Usuarios')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.usuarios.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon blue me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="" style="font-size: 2rem;"><i class="bi bi-person-fill fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Usuarios Registrados</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_usuarios }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('Ver Listado de Categorias')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.categorias.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon green me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class=""><i class="bi bi-handbag-fill fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Categorías Registradas</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_categorias }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('Ver Listado de Productos')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ url('/admin/productos') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon red me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class=""><i class="bi bi-box-seam-fill fs-1 text-white"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Productos Registrados</h6>
                            <h3 class="fw-bold mb-0">{{ $total_productos }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('Ver Listado de Pedidos')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.pedidos.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon purple me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="" style="font-size: 2rem;"><i class="bi bi-cart-plus-fill"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Pedidos Nuevos</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_pedidos_nuevo }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('Ver Listado de Pedidos')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.pedidos.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon blue me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class="" style="font-size: 2rem;"><i class="bi bi-send-check-fill"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Pedidos Enviados</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_pedidos_enviados }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan
        @can('Ver Listado de Pedidos')
        <div class="col-12 col-md-6 col-lg-3 mb-4">
            <a href="{{ route('admin.pedidos.index') }}" class="text-decoration-none-custom">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="card-body d-flex align-items-center px-4 py-4">
                        <div class="stats-icon green me-4 d-flex justify-content-center align-items-center"
                            style="width: 60px; height: 60px; border-radius: 0.5rem;">
                            <i class=""><i class="bi bi-dropbox"></i></i>
                        </div>
                        <div>
                            <h6 class="text-muted fw-semibold mb-1 text-uppercase"
                                style="font-size: 0.8rem; letter-spacing: 0.5px;">Pedidos Totales</h6>
                            <h3 class="fw-bold mb-0 ">{{ $total_pedidos }} Totales</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endcan

    </div>
    <br>
    <div class="row">
      @can('Ver Listado de Pedidos')
        <div class="col-md-6 mb-4">
           <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title">Pedidos Totales Mensuales</h5>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
           </div>
        </div>
      @endcan
      @can('Ver Listado de Pedidos')
        <div class="col-md-6 mb-4">
           <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title">Productos Vendidos Mensualmente</h5>
            </div>
            <div class="card-body">
                <div id="chart-productos"></div>
            </div>
           </div>
        </div>
      @endcan
    </div>
    
    <div class="row">
      @can('Ver Listado de Pedidos')
        <div class="col-12 mb-4">
           <div class="card h-100 shadow-sm border-0">
            <div class="card-header d-flex justify-content-between align-items-center border-0 pt-4 pb-0" style="background: transparent;">
                <h5 class="card-title fw-bold mb-0">Ingresos Anuales (Año Actual)</h5>
                <h4 class="fw-bold mb-0 text-success">${{ number_format($ingresoTotalAnual, 2) }} <span class="fs-6 text-muted fw-normal">Total Anual Recaudado</span></h4>
            </div>
            <div class="card-body">
                <div id="chart-ingresos"></div>
            </div>
           </div>
        </div>
      @endcan
    </div>

    <style>
        /* PARCHE DEFINITIVO PARA APEXCHARTS EN SCROLL Y MODO OSCURO */
        .apexcharts-canvas {
            transform: translateZ(0) !important;
        }
        .apexcharts-tooltip {
            background: var(--bs-body-bg, #fff) !important;
            border: 1px solid var(--bs-border-color, #e5e7eb) !important;
            color: var(--bs-body-color, #333) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            transition: none !important;
        }
        .apexcharts-tooltip-title {
            background: var(--bs-tertiary-bg, #f8f9fa) !important;
            border-bottom: 1px solid var(--bs-border-color, #e5e7eb) !important;
        }
        .apexcharts-text tspan {
            font-family: inherit;
        }
    </style>

    <script>
        // Gráfico 1: Pedidos por Mes (Barras)
        var optionsPedidos = {
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false },
                animations: { 
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                },
                fontFamily: "'Inter', 'Segoe UI', sans-serif"
            },
            colors: ['#4361ee'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '65%'
                }
            },
            dataLabels: { enabled: false },
            series: [{
                name: 'Pedidos',
                data: {!! json_encode($totales) !!}
            }],
            xaxis: {
                categories: {!! json_encode($meses) !!},
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#6b7280', fontSize: '13px' } }
            },
            yaxis: {
                labels: { style: { colors: '#6b7280', fontSize: '13px' } }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                yaxis: { lines: { show: true } }
            },
            tooltip: {
                theme: 'false',
                y: { formatter: function (val) { return val + " pedidos" } }
            }
        };

        var chartPedidos = new ApexCharts(document.querySelector("#chart"), optionsPedidos);
        chartPedidos.render();

        // Gráfico 2: Productos Vendidos (Columnas)
        var optionsProductos = {
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
                fontFamily: "'Inter', 'Segoe UI', sans-serif"
            },
            colors: ['#a3e635'], // Verde lima intenso
            plotOptions: {
                bar: {
                    borderRadius: 4, 
                    columnWidth: '65%', // Barras más anchas
                    distributed: false 
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.25,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            series: [{
                name: 'Productos Vendidos',
                data: {!! json_encode($totalesProductos) !!}
            }],
            xaxis: {
                categories: {!! json_encode($meses) !!},
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    style: { colors: '#6b7280', fontSize: '13px', fontWeight: 600 }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: '#6b7280', fontSize: '13px' }
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                yaxis: { lines: { show: true } }
            },
            tooltip: {
                theme: 'false',
                y: { formatter: function (val) { return val + " productos" } }
            }
        };

        var chartProductos = new ApexCharts(document.querySelector("#chart-productos"), optionsProductos);
        chartProductos.render();

        // Gráfico 3: Ingresos Totales (Área)
        var optionsIngresos = {
            chart: {
                type: 'area',
                height: 380,
                toolbar: { show: false },
                animations: { enabled: true, easing: 'easeinout', speed: 800 },
                fontFamily: "'Inter', 'Segoe UI', sans-serif"
            },
            colors: ['#10b981'], // Verde esmeralda para el dinero
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                    stops: [0, 90, 100]
                }
            },
            stroke: {
                curve: 'smooth',
                width: 4
            },
            series: [{
                name: 'Ingresos',
                data: {!! json_encode($totalesIngresos) !!}
            }],
            xaxis: {
                categories: {!! json_encode($mesesIngresos) !!},
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#6b7280', fontSize: '13px', fontWeight: 600 } }
            },
            yaxis: {
                labels: { 
                    style: { colors: '#6b7280', fontSize: '13px', fontWeight: 600 },
                    formatter: function (val) { return "$" + val.toLocaleString() }
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
                yaxis: { lines: { show: true } }
            },
            markers: {
                size: 5,
                colors: ['#fff'],
                strokeColors: '#10b981',
                strokeWidth: 3,
                hover: { size: 8 }
            },
            tooltip: {
                theme: 'false',
                y: { formatter: function (val) { return "$" + val.toLocaleString() } }
            }
        };

        var chartIngresos = new ApexCharts(document.querySelector("#chart-ingresos"), optionsIngresos);
        chartIngresos.render();
    </script>
@endsection

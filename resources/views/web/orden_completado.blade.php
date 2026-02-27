@extends('layouts.web')

@section('title', 'Compra Exitosa | Gracias por tu pedido')

@section('content')
    <div class="page-title light-background">
        <div class="container text-center">
            <h1 class="mb-2 mb-lg-0">Confirmación de Pedido</h1>
        </div>
    </div>

    <section id="confirmation" class="confirmation section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            {{-- Bloque de Agradecimiento y Resumen Superior --}}
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 text-center p-5 bg-light-subtle">
                        <i class="bi bi-check-circle display-1 text-success mb-3"></i>
                        <h2 class="card-title text-success mb-3">¡Gracias por tu compra!</h2>
                        <p class="lead mb-4">
                            Tu pedido ha sido procesado con éxito y está confirmado. Recibirás una copia de esta
                            confirmación por correo electrónico.
                        </p>

                        <div class="confirmation-details d-flex justify-content-around fw-bold flex-wrap">
                            <span class="mb-2 mb-md-0">
                                **Orden Nº:** <span class="text-primary">{{ $orden->id }}</span>
                            </span>
                            <span class="mb-2 mb-md-0">
                                **Total Pagado:** <span
                                    class="text-primary">{{ $orden->divisa . ' ' . number_format($orden->total, 2) }}</span>
                            </span>
                            {{-- **Añadido: Fecha del Pedido** --}}
                            <span class="mb-2 mb-md-0">
                                **Fecha:** <span
                                    class="text-secondary">{{ \Carbon\Carbon::parse($orden->created_at)->format('d/m/Y H:i') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-auto">
                    <a href="{{ url('/') }}"
                        class="btn btn-dark btn-sm"
                        style="font-size: 0.8rem; padding: 0.2rem 0.8rem; border-radius: 999px; background-color: #000; border-color: #000;">
                        Volver al inicio
                    </a>
                </div>
            </div>

            <div class="row">

                {{-- Columna Izquierda: Detalles del Pedido --}}
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="mb-3">Productos Adquiridos</h4>
                    <div class="order-items list-group mb-4">

                        @foreach ($orden->detalles as $detalle)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $detalle->producto->nombre }}</h6>
                                    @php
                                        $imagen_producto = $detalle->producto->imagenes->first();
                                        $imagen = $imagen_producto->imagen ?? '';
                                    @endphp
                                    <img src="{{ asset('storage/' . $imagen) }}" width="70px" alt="Product"
                                        loading="lazy">
                                    <small class="text-muted">
                                        Cantidad: {{ $detalle->cantidad }} x
                                        {{ $ajuste->divisa . ' ' . number_format($detalle->precio, 2) }}
                                    </small>
                                </div>
                                <span class="fw-bold">
                                    {{ $ajuste->divisa . ' ' . number_format($detalle->cantidad * $detalle->precio, 2) }}
                                </span>
                            </div>
                        @endforeach
                    </div>


                    <div class="card p-3 mb-4 border-info-subtle bg-info-subtle">
                        <h5 class="card-title mb-2"><i class="bi bi-geo-alt me-2"></i>Dirección de Envío</h5>
                        <p class="card-text mb-0">**{{ $orden->usuario->name ?? 'Cliente' }}**</p> {{-- Suponiendo que tienes un campo nombre_cliente --}}
                        <P class="card-text mb-0">{{ $orden->usuario->email ?? 'Correo no disponible' }}</P>
                        <p class="card-text mb-0">{{ $orden->direccion_envio }}</p>
                    </div>

                </div>
                {{-- Columna Derecha: Resumen de Pagos y Contacto --}}
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">

                    {{-- Resumen de Montos --}}
                    <div class="card shadow-sm p-4 mb-4">
                        <h5 class="mb-3">Resumen del Pago</h5>
                        <ul class="list-unstyled">

                            <li class="d-flex justify-content-between fw-bold pt-2 border-top">
                                <span>Total Final:</span>
                                <span
                                    class="text-success fs-5">{{ $ajuste->divisa . ' ' . number_format($orden->total, 2) }}</span>
                            </li>
                        </ul>
                        <p class="text-muted mt-3 mb-0">
                            Método de Pago: **Paypal**
                        </p>
                        <p class="text-muted mb-0">Estado: **{{ ucfirst($orden->estado_orden) }}**</p>
                    </div>

                    {{-- Siguientes Pasos --}}
                    <div class="card p-4">
                        <h5 class="mb-3">¿Qué sigue?</h5>
                        <p class="mb-2"><i class="bi bi-envelope me-2 text-warning"></i> Revisa tu correo electrónico para
                            la factura detallada.</p>
                        <p class="mb-2"><i class="bi bi-truck me-2 text-warning"></i> Recibirás una notificación cuando tu
                            pedido sea enviado.</p>
                    </div>
                </div>



            </div> <!-- Cierre de .container -->
    </section> <!-- Cierre de #confirmation -->
@endsection

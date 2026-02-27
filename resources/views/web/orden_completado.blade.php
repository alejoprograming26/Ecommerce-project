@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">¡Gracias por tu compra!</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Order Completed Section -->
    <section id="order-completed" class="order-completed section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="200">
                    <h2>Tu orden ha sido completada exitosamente.</h2>
                    <p>Recibirás un correo de confirmación con los detalles de tu compra.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-4">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </section><!-- End Order Completed Section -->
@endsection

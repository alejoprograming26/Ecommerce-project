@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Registro</h1>

        </div>
    </div><!-- End Page Title -->

    <!-- Register Section -->
    <section id="register" class="register section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="registration-form-wrapper">
                        <div class="form-header text-center">
                            <h2>Crea tu cuenta</h2>
                            <p>Crea tu cuenta y empieza a comprar con nosotros</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <form action="{{ url('/web/registro') }}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="fullName" name="name"
                                            placeholder="Full Name" required="" autocomplete="name">
                                        <label for="Nombre y Apellido">Nombre y Apellido</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email " required="" autocomplete="email">
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Password" required="" minlength="8"
                                                    autocomplete="new-password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="confirmPassword"
                                                    name="password_confirmation" placeholder="Confirmar Contraseña"
                                                    required="" minlength="8" autocomplete="new-password">
                                                <label for="confirmPassword">Confirmar Contraseña</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="d-grid mb-4">
                                        <button type="submit" class="btn btn-register">Crear Cuenta</button>
                                    </div>

                                    <div class="login-link text-center">
                                        <p>¿Ya tienes una cuenta? <a href="{{ '/web/login' }}">Iniciar Sesión </a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="decorative-elements">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                            <div class="circle circle-3"></div>
                            <div class="square square-1"></div>
                            <div class="square square-2"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Register Section -->
@endsection

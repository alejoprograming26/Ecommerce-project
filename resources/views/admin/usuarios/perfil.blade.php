@extends('layouts.admin')

@section('content')
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Perfil de Usuario</h3>
                <p class="text-subtitle text-muted">Información del usuario</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
               
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="avatar avatar-2xl">
                                <img src="{{asset('storage/'.$ajuste->logo)}}" style="width: 150px; height: 100px;" class="rounded-circle" alt="Avatar">
                            </div>

                            <h3 class="mt-3">{{$usuario->name}}</h3>
                            <p class="text-small">{{$usuario->email}}</p>
                            <p class="text-small">{{$usuario->roles->first()->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{$usuario->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="{{$usuario->email}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
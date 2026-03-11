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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('admin/usuarios/'.$usuario->id.'/update_perfil')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{$usuario->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="{{$usuario->email}}">
                            </div>
                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Cambiar Contraseña</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/usuarios/'.$usuario->id.'/update_password')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-2">
                                <label for="password_actual" class="form-label">Contraseña Actual</label>
                                <input type="password" name="password_actual" id="password_actual"
                                    class="form-control" placeholder="Ingrese su contraseña actual">
                                @error('password_actual')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">Nueva Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Ingrese nueva contraseña">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirme contraseña">
                            </div>

                            <div class="form-group my-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         
    </section>
</div>

@endsection
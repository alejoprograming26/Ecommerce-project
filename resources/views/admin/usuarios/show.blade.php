@extends('layouts.admin')

@section('content')
    <h2>
        Datos del Usuarios: {{ $usuario->name }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Informacion Registrada</b></h4>
                </div>

                <div class="card-body">
                    
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre del Usuario (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ingrese el Nombre del Usuario" value="{{ old('name', $usuario->name) }}"  disabled>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email del Usuario (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Ingrese el Email del Usuario" value="{{ old('email', $usuario->email) }}" disabled>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol">Rol del Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                        <input type="text" class="form-control" name="rol" id="rol"
                                             value="{{ $usuario->roles->pluck('name')->implode(', ') }}" disabled> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Fecha Y hora de Registro</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        <input type="text" class="form-control" name="estado" id="estado"
                                             value="{{ $usuario->created_at->format('d/m/Y H:i:s') }}" disabled> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary"><i
                                            class="bi bi-arrow-left"></i>
                                        volver</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection

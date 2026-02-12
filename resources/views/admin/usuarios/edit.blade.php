@extends('layouts.admin')

@section('content')
    <h2>
        Modificar Datos del Usuario: {{ $usuario->name }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Llene los Datos del Formulario</b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/usuarios/'. $usuario->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre del Usuario (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ingrese el Nombre del Usuario" value="{{ old('name', $usuario->name) }}" required>
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
                                            placeholder="Ingrese el Email del Usuario" value="{{ old('email', $usuario->email) }}" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password del Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Ingrese el Password del Usuario" >
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirme la contraseña" >
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol">Rol del Usuario (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                        <select name="rol" id="rol" class="form-control" required>
                                            <option value="">Seleccione un Rol</option>
                                            @foreach ($roles as $rol)
                                                @if ($rol->name != 'SUPER ADMIN')
                                                    <option value="{{ $rol->name}}" 
                                                    {{ old('rol', $usuario->roles->pluck('name')->implode(', ')) == $rol->name ? 'selected' : '' }}>
                                                    {{ $rol->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('rol')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                        Actualizar</button>
                                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary"><i
                                            class="bi bi-arrow-left"></i>
                                        volver</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

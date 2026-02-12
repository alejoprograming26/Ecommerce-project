@extends('layouts.admin')

@section('content')
    <h2>
        Crear los Roles del Sistema</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Llene los Datos del Formulario<b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/roles/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ingrese el Nombre del Rol" required>
                                    </div>
                                    @error('name')
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
                                        Registrar</button>
                                   <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary"><i
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

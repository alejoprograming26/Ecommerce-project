@extends('layouts.admin')

@section('content')
    <h2>
        Rol Registrado</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Datos del Rol<b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/roles/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ingrese el Nombre del Rol" required value="{{ $rol->name }}"
                                            readonly>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Fecha de Creacion</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Ingrese el Nombre del Rol" required value="{{ $rol->created_at }}"
                                            readonly>
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

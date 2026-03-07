@extends('layouts.admin')

@section('content')
    <h2>
        Listado de Permisos del Rol {{ $rol->name }}</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Permisos Registrado del Rol</b></h4>
                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/roles/' . $rol->id . '/update_permisos') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                    <div class="row">
                         @foreach ($permisos as $modulo=>$grupo_permisos)
                    <div class="col-md-3">
                        <h4><b>{{ $modulo }}</b></h4>
                            @foreach ($grupo_permisos as $permiso)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permisos[]" value="{{ $permiso->id }}"
                                    id="persmiso_{{ $permiso->id }}" {{ $rol->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="persmiso_{{ $permiso->id }}">
                                    {{ $permiso->name }}
                                </label>
                            </div>
                        @endforeach
                        <br><br>
                    </div>
                @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Permisos</button>
                        <a href="{{ url('/admin/roles') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

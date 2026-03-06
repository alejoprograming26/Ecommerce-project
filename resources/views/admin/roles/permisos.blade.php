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
                   
                @foreach ($permisos as $permiso)
                    <ul>
                        <li>{{ $permiso->name }}</li>
                    </ul>
                @endforeach
                
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <h2>
        Configuraciones de los Roles del Sistema</h2>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Roles de Usuario</b></h4>
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary mb-0">
                            <i class="bi bi-plus-circle"></i> Crear Rol
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <h2>
        Listados de Usuarios</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Roles de Usuario</b></h4>
                        <a href="{{ url('/admin/usuarios/create') }}" class="btn btn-primary mb-0">
                            <i class="bi bi-plus-circle"></i> Crear User
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Rol</th>
                                <th>Nombre del Usuario</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($usuarios->currentPage() - 1) * $usuarios->perPage() + 1;
                            @endphp
                            @foreach ($usuarios as $usuario)
                                <tr class="text-center">
                                    <td>{{ $nro++ }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <a href="{{ url('/admin/usarios/' . $usuario->id) }}" title="Ver Rol"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ url('/admin/usarios/' . $usuario->id . '/edit') }}" title="Editar Rol"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form action="{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST"
                                            class="delete-form" style="display: inline;"
                                            data-item-name="el rol '{{ $usuario->name }}'">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($usuarios->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de
                                {{ $usuarios->total() }} usuarios
                            </div>
                            <div>
                                {{ $usuarios->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

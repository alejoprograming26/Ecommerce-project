@extends('layouts.admin')

@section('content')
    <h2>
        Listado Roles del Sistema</h2>
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

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                            @endphp
                            @foreach ($roles as $role)
                                <tr class="text-center">
                                    <td>{{ $nro++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ url('/admin/roles/' . $role->id) }}" title="Ver Rol"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Editar Rol"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <form action="{{ url('/admin/roles/' . $role->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este rol?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($roles->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Mostrando {{ $roles->firstItem() }} a {{ $roles->lastItem() }} de
                                {{ $roles->total() }} roles
                            </div>
                            <div>
                                {{ $roles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

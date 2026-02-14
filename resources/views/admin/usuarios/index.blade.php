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
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <form action="{{ url('admin/usuarios') }}" method="GET">
                                <div class="row align-items-end">
                                    <div class="col-md-3">
                                        <label for="buscar" class="form-label">Buscar</label>
                                        <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Nombre o email"
                                            value="{{ request()->get('buscar') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select name="estado" id="estado" class="form-select">
                                            <option value="">Todos los estados</option>
                                            <option value="1" {{ request()->get('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ request()->get('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rol" class="form-label">Rol</label>
                                        <select name="rol" id="rol" class="form-select">
                                            <option value="">Todos los roles</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ request()->get('rol') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="btn-group w-100">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-filter"></i> Filtrar
                                            </button>
                                            @if (request()->hasAny(['buscar', 'estado', 'rol']))
                                                <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                                                    <i class="bi bi-x-circle"></i> Limpiar
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Rol</th>
                                <th>Nombre del Usuario</th>
                                <th>Email</th>
                                <th>Estado</th>
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
                                    <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if ($usuario->estado==0)
                                           <span class="badge bg-danger">Inactivo</span>
                                        @else
                                             <span class="badge bg-success">Activo</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($usuario->trashed())
                                          <form action="{{ url('/admin/usuarios/' . $usuario->id . '/restaurar') }}" method="POST"
                                                class="restore-form" style="display: inline;"
                                                data-item-name="el usuario '{{ $usuario->name }}'">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-arrow-clockwise"></i> Restaurar
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ url('/admin/usuarios/' . $usuario->id) }}" title="Ver"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ url('/admin/usuarios/' . $usuario->id . '/edit') }}" title="Editar "
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ url('/admin/usuarios/' . $usuario->id) }}" method="POST"
                                                class="delete-form" style="display: inline;"
                                                data-item-name="el Usuario '{{ $usuario->name }}'">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        @endif
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

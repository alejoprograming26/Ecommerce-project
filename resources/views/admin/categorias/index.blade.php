@extends('layouts.admin')

@section('content')
    <h2>
        Listado de Categorias del Sistema</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Categorias Registradas</b></h4>
                        <a href="{{ url('/admin/categorias/create') }}" class="btn btn-primary mb-0">
                            <i class="bi bi-plus-circle"></i> Crear
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/categorias') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control"
                                        placeholder="Buscar categorias..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary"><i
                                                class="bi bi-x-circle"></i> Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($categorias->currentPage() - 1) * $categorias->perPage() + 1;
                            @endphp
                            @foreach ($categorias as $categoria)
                                <tr class="text-center">
                                    <td>{{ $nro++ }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->slug }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" >
                                            <a href="{{ url('/admin/categorias/' . $categoria->id) }}" title="Ver Categoria"
                                            class="btn btn-sm btn-info mb-3">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ url('/admin/categorias/' . $categoria->id . '/edit') }}"
                                            title="Editar Categoria" class="btn btn-sm btn-success mb-3">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                         <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST"
                                            class="delete-form" style="display: inline;"
                                            data-item-name="la categoria '{{ $categoria->nombre }}'">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                            
                                        </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($categorias->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Mostrando {{ $categorias->firstItem() }} a {{ $categorias->lastItem() }} de
                                {{ $categorias->total() }} categorias
                            </div>
                            <div>
                                {{ $categorias->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

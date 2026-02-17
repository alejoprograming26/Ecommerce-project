@extends('layouts.admin')

@section('content')
    <h2>
        Listado de Productos del Sistema</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Productos Registrados</b></h4>
                        <a href="{{ url('/admin/productos/create') }}" class="btn btn-primary mb-0">
                            <i class="bi bi-plus-circle"></i> Crear
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/productos') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control"
                                        placeholder="Buscar Producto..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/productos') }}" class="btn btn-secondary"><i
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
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Descripcion Corta</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($productos->currentPage() - 1) * $productos->perPage() + 1;
                            @endphp
                            @foreach ($productos as $producto)
                                <tr class="text-center">
                                    <td>{{ $nro++ }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->codigo }}</td>
                                    <td>{{ $producto->descripcion_corta }}</td>
                                    <td>{{ $producto->precio_compra }}</td>
                                    <td>{{ $producto->precio_venta }}</td>
                                    <td>{{ $producto->stock }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/productos/' . $producto->id) }}" title="Ver Producto"
                                                class="btn btn-sm btn-info mb-3">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ url('/admin/productos/' . $producto->id . '/edit') }}"
                                                title="Editar Producto" class="btn btn-sm btn-success mb-3">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('admin.productos.destroy', $producto->id) }}"
                                                method="POST" class="delete-form" style="display: inline;"
                                                data-item-name="el producto '{{ $producto->nombre }}'">
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
                    @if ($productos->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                                {{ $productos->total() }} productos
                            </div>
                            <div>
                                {{ $productos->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

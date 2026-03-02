@extends('layouts.admin')

@section('content')
    <h2>
        Listado de Pedidos Webs del Sistema</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><b>Pedidos Registrados</b></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <form action="{{ url('/admin/pedidos') }}" method="GET">
                                <div class="row g-2 align-items-center">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="buscar" class="form-control"
                                                placeholder="Cliente, Email o Producto..." value="{{ request('buscar') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-funnel"></i></span>
                                            <select name="estado" class="form-select">
                                                <option value="">Estado: Todos</option>
                                                <option value="Procesando" {{ request('estado') == 'Procesando' ? 'selected' : '' }}>Procesando</option>
                                                <option value="Enviado" {{ request('estado') == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i> Buscar
                                        </button>
                                        @if (request('buscar') || request('estado'))
                                            <a href="{{ url('/admin/pedidos') }}" class="btn btn-secondary">
                                                <i class="bi bi-x-circle"></i> Limpiar Filtros
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Estado Pedido</th>
                                <th>Estado Orden</th>
                                <th>Direccion Envio</th>
                                <th>Detalles (Productos)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($pedidos->currentPage() - 1) * $pedidos->perPage() + 1;
                            @endphp
                            @foreach ($pedidos as $pedido)
                                <tr class="text-center">
                                    <td>{{ $nro++ }}</td>
                                    <td>{{ $pedido->usuario->name }}<br><small>{{ $pedido->usuario->email }}</small></td>
                                    <td>{{ $pedido->total }}</td>
                                    <td>{{ $pedido->estado_pago }}</td>
                                    <td>{{ $pedido->estado_orden }}</td>
                                    <td>{{ $pedido->direccion_envio }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($pedido->detalles as $detalle)
                                                <li><b>{{ $detalle->producto->nombre }}</b></li>
                                                Cantidad: {{ $detalle->cantidad }}
                                                Precio: {{ $detalle->precio }} {{ $detalle->divisa }}
                                            @endforeach
                                        </ul>


                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/pedidos/' . $pedido->id) }}" title="Ver Producto"
                                                class="@if ($pedido->estado_orden == 'Procesando') btn btn-sm btn-success mb-3 @else btn btn-sm btn-info mb-3 @endif">
                                                <i class="bi bi-truck"></i>
                                                @if ($pedido->estado_orden == 'Procesando')
                                                    Tomar Pedido
                                                @else
                                                    Ver Pedido
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($pedidos->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Mostrando {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }} de
                                {{ $pedidos->total() }} pedidos
                            </div>
                            <div>
                                {{ $pedidos->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

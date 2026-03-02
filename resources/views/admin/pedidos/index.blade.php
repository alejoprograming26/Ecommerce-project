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
                        <div class="col-md-6">
                            <form action="{{ url('/admin/pedidos') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control"
                                        placeholder="Buscar Pedidos..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/pedidos') }}" class="btn btn-secondary"><i
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

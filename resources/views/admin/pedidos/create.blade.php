@extends('layouts.admin')

@section('content')
    <h2>Pedido Nro: #{{ $pedido->id }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Detalles del Pedido</b></h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Cliente</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-file-earmark-person"></i></span>
                                    <input type="text" class="form-control" value="{{ $pedido->usuario->name }} "
                                        disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Total de la Orden</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                                    <input type="text" class="form-control"
                                        value="{{ $pedido->total }} {{ $pedido->divisa }} " disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Estado de Pago</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                    <input type="text" class="form-control" value="{{ $pedido->estado_pago }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Estado de la Orden</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-receipt"></i></span>
                                    <input type="text" class="form-control" value="{{ $pedido->estado_orden }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Direccion de Envio</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-pin-map-fill"></i></span>
                                    <input type="text" class="form-control" value="{{ $pedido->direccion_envio }}"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Fecha y Hora del Pedido</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                    <input type="text" class="form-control" value="{{ $pedido->created_at }}" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h5>Detalles del Pedido (Productos)</h5>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($pedido->detalles as $detalle)
                                    @php
                                        $imagen_producto = $detalle->producto->imagenes->first();
                                        $imagen = $imagen_producto->imagen ?? '';
                                        $subtotal = $detalle->producto->precio_venta * $detalle->cantidad;
                                        $total += $subtotal;
                                    @endphp
                                    <tr style="text-align: center;">
                                        <td><img src="{{ asset('storage/' . $imagen) }}" width="70" class="img-fluid"
                                                alt="Imagen del producto"></td>
                                        <td>
                                            <h5><a href="{{ url('/admin/productos', $detalle->producto->id) }}">
                                                    {{ $detalle->producto->nombre }}</a></h5>
                                        </td>
                                        <td>{{ $detalle->producto->descripcion_corta }}</td>
                                        <td>{{ $detalle->producto->precio_venta }} {{ $pedido->divisa }}</td>
                                        <td>{{ $detalle->cantidad }}</td>
                                        <td>{{ $subtotal }} {{ $pedido->divisa }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>{{ $total }} {{ $pedido->divisa }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>



                    @if ($pedido->estado_orden == 'Procesando')
                        <h5>Tomar Notas del Pedido</h5>
                        <form action="{{ url('/admin/pedidos/' . $pedido->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="descripcion_larga">Nota</label>
                                        <div class="input-group">
                                            <div style="width: 100%">
                                                <textarea class="form-control ckeditor" name="nota" id="nota" rows="6" placeholder="Nota del Pedido">{{ old('nota') }}</textarea>
                                            </div>
                                        </div>
                                        @error('nota')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>


                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                            Tomar Pedido</button>
                                        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">
                                            <i class="bi bi-arrow-left"></i> volver
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Hacer que el editor herede el fondo y color del contenedor (soporta modo oscuro) */
        .ck-editor__editable_inline,
        .ck-editor__editable,
        .ck-content {
            background: transparent !important;
            color: inherit !important;
        }

        .ck.ck-toolbar,
        .ck-toolbar {
            background: transparent !important;
            color: inherit !important;
            border: none !important;
        }

        .ck.ck-toolbar .ck-button {
            color: inherit !important;
        }

        /* Paneles y dropdowns: semitransparente para legibilidad en modo oscuro */
        .ck.ck-dropdown__panel,
        .ck.ck-panel,
        .ck-balloon-panel {
            background: rgba(0, 0, 0, 0.65) !important;
            color: #fff !important;
        }

        /* Asegurar texto blanco en areas oscuras típicas */
        .card.bg-dark .ck-editor__editable_inline,
        body.dark .ck-editor__editable_inline {
            color: #fff !important;
        }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Editor para el contenido (más completo)
            ClassicEditor
                .create(document.querySelector('#nota'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                            'link', 'bulletedList', 'numberedList', '|',
                            'outdent', 'indent', '|',
                            'alignment', '|',
                            'blockQuote', 'insertTable', 'mediaEmbed', '|',
                            'undo', 'redo', '|',
                            'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                            'code', 'codeBlock', 'htmlEmbed', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    language: 'es',
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection

@extends('layouts.admin')

@section('content')
    <h2>
        Datos del Producto: {{ $producto->nombre }}
        <div style="float: right">
            <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>
                volver</a>
        </div>
    </h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Datos Registrados</b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/productos/create') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoria</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <input type="hidden" name="categoria_id" id="categoria_id" class="form-control"
                                            required value="{{ $producto->categoria_id }}">
                                        <input type="text" class="form-control"
                                            value="{{ $producto->categoria->nombre }}" disabled>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            placeholder="Ingrese el Nombre del Producto"
                                            value="{{ old('nombre', $producto->nombre) }}" disabled>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Codigo del Producto</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-qr-code"></i></span>
                                        <input type="text" class="form-control" name="codigo" id="codigo"
                                            placeholder="PROD0000" value="{{ old('codigo', $producto->codigo) }}" disabled>
                                    </div>
                                    @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion_corta">Descripcion Corta (*)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-text-paragraph"></i></span>
                                                    <input type="text" class="form-control" name="descripcion_corta"
                                                        id="descripcion_corta"
                                                        placeholder="Ingrese una Descripcion Corta del Producto"
                                                        value="{{ old('descripcion_corta', $producto->descripcion_corta) }}"
                                                        disabled>
                                                </div>
                                                @error('descripcion_corta')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="precio_compra">Precio De Compra (*)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-currency-exchange"></i></span>
                                                    <input type="number" class="form-control" name="precio_compra"
                                                        id="precio_compra" placeholder="0.00"
                                                        value="{{ old('precio_compra', $producto->precio_compra) }}"
                                                        disabled>
                                                </div>
                                                @error('precio_compra')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="precio_venta">Precio de Venta (*)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-currency-dollar"></i></span>
                                                    <input type="number" class="form-control" name="precio_venta"
                                                        id="precio_venta" placeholder="0.00"
                                                        value="{{ old('precio_venta', $producto->precio_venta) }}"
                                                        disabled>
                                                </div>
                                                @error('precio_venta')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="stock">Stock (*)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-graph-up-arrow"></i></span>
                                                    <input type="number" class="form-control" name="stock"
                                                        id="stock" placeholder="0"
                                                        value="{{ old('stock', $producto->stock) }}" disabled>
                                                </div>
                                                @error('stock')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion_larga">Descripcion Larga (*)</label>
                                                <p class="text-justify">{!! $producto->descripcion_larga !!}</p>
                                                @error('descripcion_larga')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Imagenes del Producto</b>
                        <div style="float: right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus-circle"></i> Agregar Imagen
                            </button>
                        </div>
                    </h4>
                </div>

                <div class="card-body">
                    <!-- Button trigger modal --

                                                                                                                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar Iamgen del Producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/admin/productos/' . $producto->id . '/upload_imagen') }}"
                                        method="post" enctype="multipart/form-data" id="form_imagen">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <br>
                                                    <label for="iamgen" class="form-label"> Imagen del Producto
                                                    </label>
                                                    <input type="hidden" name="producto_id"
                                                        value="{{ $producto->id }}">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-camera"></i></span>
                                                        <input type="file" name="imagen" id="imagen_login"
                                                            onchange="mostrarImagen2(event)"
                                                            class="form-control @error('imagen') is-invalid @enderror"
                                                            placeholder="" value="{{ old('imagen') }}" required>

                                                        @error('imagen')
                                                            <div class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <center>
                                                    <img src="" id="preview2" class="img-fluid"
                                                        style="max-width: 200px; margin-top: 10px;">
                                                </center>
                                                <script>
                                                    const mostrarImagen2 = (e) => {
                                                        document.getElementById("preview2").src = URL.createObjectURL(e.target.files[0]);
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div style="float: right">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" form="form_imagen" class="btn btn-primary">Guardar
                                                    Imagen</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($producto->imagenes as $imagen)
                            <div class="col-md-3" style="margin-top: 10px">
                                <div class="card mb-3">
                                    <img src="{{ asset('storage/' . $imagen->imagen) }}" class="card-img-top"
                                        alt="Imagen del Producto">
                                    <form
                                        action="{{ url('/admin/productos/' . $producto->id . '/eliminar_imagen/' . $imagen->id) }}"
                                        method="POST" class="delete-form" style="display: inline;"
                                        data-item-name="La Imagen  del producto '{{ $producto->nombre }}'">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-block btn-danger">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>

                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

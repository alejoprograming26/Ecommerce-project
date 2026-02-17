@extends('layouts.admin')

@section('content')
    <h2>
        Crear Producto del Sistema</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Llene los Datos del Formulario<b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/productos/create') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoria (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="">Seleccione una Categoria</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            placeholder="Ingrese el Nombre del Producto" value="{{ old('nombre') }}"
                                            required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Codigo del Producto (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-qr-code"></i></span>
                                        <input type="text" class="form-control" name="codigo" id="codigo"
                                            placeholder="PROD0000" value="{{ old('codigo') }}" required>
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
                                                        value="{{ old('descripcion_corta') }}" required>
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
                                                        value="{{ old('precio_compra') }}" required>
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
                                                        value="{{ old('precio_venta') }}" required>
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
                                                    <input type="number" class="form-control" name="stock" id="stock"
                                                        placeholder="0" value="{{ old('stock') }}" required>
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
                                                <div class="input-group">
                                                    <div style="width: 100%">
                                                        <textarea class="form-control ckeditor" name="descripcion_larga" id="descripcion_larga" rows="6"
                                                            placeholder="" required>{{ old('descripcion_larga') }}</textarea>
                                                    </div>
                                                </div>
                                                @error('descripcion_larga')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    // Editor para el contenido (más completo)
                                                    ClassicEditor
                                                        .create(document.querySelector('#descripcion_larga'), {
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                        Registrar</button>
                                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary"><i
                                            class="bi bi-arrow-left"></i>
                                        volver</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

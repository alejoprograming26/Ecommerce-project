@extends('layouts.admin')

@section('content')
    <h2>
        Configuraciones del Sistema</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>Ajustes</b></h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/ajustes/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                <input type="text" name="nombre" id="nombre"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    placeholder="Nombre de la Empresa"
                                                    value="{{ old('nombre', $ajuste->nombre ?? '') }}" required>

                                                @error('nombre')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripcion (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                                <input type="text" name="descripcion" id="descripcion"
                                                    class="form-control @error('descripcion') is-invalid @enderror"
                                                    placeholder="Descripcion de la Empresa"
                                                    value="{{ old('descripcion', $ajuste->descripcion ?? '') }}" required>

                                                @error('descripcion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sucursal" class="form-label">Sucursal (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-shop"></i></span>
                                                <input type="text" name="sucursal" id="sucursal"
                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                    placeholder="Ej: Casa Matriz"
                                                    value="{{ old('sucursal', $ajuste->sucursal ?? '') }}" required>

                                                @error('sucursal')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="direccion" class="form-label">Direccion (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                                <textarea name="direccion" rows="1" id="direccion" class="form-control @error('direccion') is-invalid @enderror"
                                                    placeholder="Direccion de la Empresa" required>{{ old('direccion', $ajuste->direccion ?? '') }}</textarea>

                                                @error('direccion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono" class="form-label">Telefono (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                <input type="text" name="telefonos" id="telefono"
                                                    class="form-control @error('telefonos') is-invalid @enderror"
                                                    placeholder="Ej: 0412 04431212"
                                                    value="{{ old('telefonos', $ajuste->telefonos ?? '') }}" required>

                                                @error('telefonos')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Ej: info@empresa.com"
                                                    value="{{ old('email', $ajuste->email ?? '') }}" required>

                                                @error('email')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="divisa" class="form-label">Divisa (*)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                <select name='divisa' class="form-control">
                                                    <option value="">-- Seleccione una Divisa --</option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}"
                                                            {{ old('divisa', $ajuste->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                            {{ $divisa['name'] }} - {{ $divisa['symbol'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('divisa')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pagina_web" class="form-label">Pagina Web</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="bi bi-currency-exchange"></i></span>
                                                <input type="text" name="pagina_web" id="pagina_web"
                                                    class="form-control @error('pagina_web') is-invalid @enderror"
                                                    placeholder="Ej: https://www.empresa.com"
                                                    value="{{ old('pagina_web', $ajuste->pagina_web ?? '') }}">

                                                @error('pagina_web')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="logo" class="form-label"> Logo @if (isset($ajuste) && $ajuste->logo)
                                            @else
                                                (*)
                                            @endif </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-image"></i></span>
                                            <input type="file" name="logo" id="logo"
                                                onchange="mostrarImagen(event)"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                placeholder="Ej: https://www.empresa.com" value="{{ old('logo') }}"
                                                @if (isset($ajuste) && $ajuste->logo) @else
                                                required @endif>

                                            @error('logo')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <center>
                                        @if (isset($ajuste) && $ajuste->logo)
                                            <img src="{{ asset('storage/' . $ajuste->logo) }}"
                                                style="max-width: 200px; margin-top: 10px;" id="preview1">
                                        @else
                                            <img src="" id="preview1" class="img-fluid"
                                                style="max-width: 200px; margin-top: 10px;">
                                        @endif

                                        <script>
                                            const mostrarImagen = (e) => {
                                                document.getElementById("preview1").src = URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </center>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <label for="imagen_login" class="form-label"> Imagen Login @if (isset($ajuste) && $ajuste->imagen_login)
                                            @else
                                                (*)
                                            @endif
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-camera"></i></span>
                                            <input type="file" name="imagen_login" id="imagen_login"
                                                onchange="mostrarImagen2(event)"
                                                class="form-control @error('imagen_login') is-invalid @enderror"
                                                placeholder="" value="{{ old('imagen_login') }}"
                                                @if (isset($ajuste) && $ajuste->imagen_login) @else
                                                required @endif>

                                            @error('imagen_login')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <center>
                                        @if (isset($ajuste) && $ajuste->imagen_login)
                                            <img src="{{ asset('storage/' . $ajuste->imagen_login) }}"
                                                style="max-width: 200px; margin-top: 10px;" id="preview2">
                                        @else
                                            <img src="" id="preview2" class="img-fluid"
                                                style="max-width: 200px; margin-top: 10px;">
                                        @endif
                                        <img src="" id="preview2" class="img-fluid"
                                            style="max-width: 200px; margin-top: 10px;">
                                        <script>
                                            const mostrarImagen2 = (e) => {
                                                document.getElementById("preview2").src = URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                                    Guardar</button>
                                <a href="{{ url('admin') }}" class="btn btn-danger"><i class="bi bi-x-circle"></i>
                                    Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

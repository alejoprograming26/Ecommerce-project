@extends('layouts.admin')

@section('content')
    <h2>
        Datos de la Categoria : {{ $categoria->nombre }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Datos Registrados de la Categoria<b></h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/categorias/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre de la Categoria (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            placeholder="Ingrese el Nombre de la Categoria" value="{{ old('nombre', $categoria->nombre) }}" disabled >
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Slug (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            placeholder="Ingrese el Slug" value="{{ old('slug', $categoria->slug) }}" disabled>
                                    </div>
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                          <small class="text-muted">Ejemplo: (ropa-deportiva)</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Descripción (*)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-paragraph"></i></span>
                                       <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="4" placeholder="Ingrese la Descripción" disabled>{{ old('descripcion', $categoria->descripcion) }}</textarea>
                                    </div>
                                    @error('descripcion')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="name">Hora Y Fecha de Creacion</label>
                                  <div class="input-group">
                                      <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                      <input type="text" class="form-control" name="created_at" id="created_at" value="{{ old('created_at', $categoria->created_at) }}" disabled>
                                  </div>
                                  @error('created_at')
                                      <small class="text-danger">{{ $message }}</small>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
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
    <script>
// Generar slug automáticamente desde el nombre
document.getElementById('nombre').addEventListener('input', function() {
    let nombre = this.value;
    let slug = nombre.toLowerCase()
        .replace(/[áàäâ]/g, 'a')
        .replace(/[éèëê]/g, 'e')
        .replace(/[íìïî]/g, 'i')
        .replace(/[óòöô]/g, 'o')
        .replace(/[úùüû]/g, 'u')
        .replace(/[ñ]/g, 'n')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
        
    document.getElementById('slug').value = slug;
});
</script>
@endsection

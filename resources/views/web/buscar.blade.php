@extends('layouts.web')

@section('content')
    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Resultados de la Busqueda "{{ $query ?? '' }}"</h2>
            <p>Compra ahora y disfruta de los mejores productos del mercado.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">
                @if ($productos->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            No se encontraron productos para la búsqueda "{{ $query ?? '' }}". Intenta con otro término.
                        </div>
                    </div>
                @else
                    <!-- Producto-->
                    @foreach ($productos as $producto)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-item">
                                <div class="product-image">
                                    @php
                                        $imagen_producto = $producto->imagenes->first();
                                        $imagen = $imagen_producto->imagen ?? '';
                                    @endphp
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Product Image" class="img-fluid"
                                        loading="lazy">
                                    <div class="product-actions">
                                        @auth
                                            <form action="{{ url('/favoritos') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                                <input type="hidden" name="redirect_url" value="{{ request()->fullUrl() }}">
                                                <button type="submit" class="action-btn wishlist-btn">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('web.login') }}" class="action-btn wishlist-btn">
                                                <i class="bi bi-heart"></i>
                                            </a>
                                        @endauth
                                        <a href="{{ url('producto/' . $producto->id) }}" class="action-btn quickview-btn">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                    </div>
                                    <a href="{{ url('/carrito') }}" class="cart-btn" style="text-align: center">Agregar al
                                        Carrito</a>
                                </div>
                                <div class="product-info">
                                    <div class="product-category">{{ $producto->nombre }}</div>
                                    <h4 class="product-name">
                                        <a
                                            href="{{ url('producto/' . $producto->id) }}">{{ $producto->descripcion_corta }}</a>
                                    </h4>
                                    <div class="product-rating">
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <span class="rating-count">(38)</span><br>
                                        <span class="badge bg-danger">{{ $producto->stock }} Disponibles</span>
                                    </div>
                                    <div class="product-price">
                                        {{-- <span class="old-price">$240.00</span> --}}
                                        <span class="current-price">{{ $producto->precio_venta }}
                                            {{ $ajuste->divisa }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($productos->hasPages())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Total de productos: {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de
                                {{ $productos->total() }} productos
                            </div>
                            <div>
                                {{ $productos->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                @endif

            </div>
        </div>
    </section><!-- /Best Sellers Section -->
@endsection

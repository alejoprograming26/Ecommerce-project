@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Detalle del Producto</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Product Details Section -->
    <section id="product-details" class="product-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <!-- Product Gallery -->
                <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="150">
                    <div class="product-gallery">
                        <div class="main-showcase">
                            <div class="image-zoom-container">
                                @php
                                    $imagen_producto = $producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                <img src="{{ asset('storage/' . $imagen) }}" alt="Product Main"
                                    class="img-fluid main-product-image drift-zoom" id="main-product-image"
                                    data-zoom="{{ asset('storage/' . $imagen) }}">

                                <div class="image-navigation">
                                    <button class="nav-arrow prev-image image-nav-btn prev-image" type="button">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <button class="nav-arrow next-image image-nav-btn next-image" type="button">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="thumbnail-grid">
                            @foreach ($producto->imagenes as $item_imagen)
                                <div class="thumbnail-wrapper thumbnail-item active"
                                    data-image="{{ asset('storage/' . $item_imagen->imagen) }}">
                                    <img src="{{ asset('storage/' . $item_imagen->imagen) }}"
                                        alt="View {{ $loop->iteration }}" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-details">
                        <div class="product-badge-container">
                            <span class="badge-category">{{ $producto->categoria->nombre }}</span>
                            <div class="rating-group">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <span class="review-text">(127 reviews)</span>
                            </div>
                        </div>

                        <h1 class="product-name">{{ $producto->nombre }}</h1>

                        <div class="pricing-section">
                            <div class="price-display">
                                <span class="sale-price">{{ $producto->precio_venta }} {{ $ajuste->divisa }}</span>
                            </div>
                            <div class="savings-info">
                                <span class="discount-percent">{{ $producto->stock }} Disponibles</span>
                            </div>
                        </div>

                        <div class="product-description">
                            <p>
                                {{ $producto->descripcion_corta }}
                            </p>
                        </div>
                        <!-- Purchase Options -->
                        <div class="purchase-section">
                            <div class="quantity-control">
                                <label class="control-label">Cantidad:</label>
                                <div class="quantity-input-group">
                                    <div class="quantity-selector">
                                        <button class="quantity-btn decrease" type="button">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" min="1"
                                            max="{{ $producto->stock }}">
                                        <button class="quantity-btn increase" type="button">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="action-buttons">
                                <a href="{{ url('/carrito') }}" class="btn primary-action">
                                    <i class="bi bi-bag-plus"></i>
                                    Agregar al Carrito
                                </a>
                                <a href="{{ url('/dashboard') }}" class="btn icon-action" title="Add to Wishlist">
                                    <i class="bi bi-heart"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Benefits List -->
                        <div class="benefits-list">
                            <div class="benefit-item">
                                <i class="bi bi-truck"></i>
                                <span>Envío gratis</span>
                            </div>
                            <div class="benefit-item">
                                <i class="bi bi-arrow-clockwise"></i>
                                <span>Devoluciones sin complicaciones</span>
                            </div>
                            <div class="benefit-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Garantía de 1 año</span>
                            </div>
                            <div class="benefit-item">
                                <i class="bi bi-headset"></i>
                                <span>Soporte 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Tabs -->
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
                <div class="col-12">
                    <div class="info-tabs-container">
                        <nav class="tabs-navigation nav">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#ecommerce-product-details-5-overview" type="button">Descripcion General
                                del Producto</button>
                        </nav>

                        <div class="tab-content">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active" id="ecommerce-product-details-5-overview">
                                <div class="overview-content">
                                    <div class="row g-4">
                                        <div class="col-lg-8">
                                            <div class="content-section">
                                                {!! $producto->descripcion_larga !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- /Product Details Section -->
@endsection

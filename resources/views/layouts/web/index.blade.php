@extends('layouts.web')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="hero-container">
            <div class="hero-content">
                <div class="content-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="hero-title">Descubra productos increíbles</h1>
                    <p class="hero-description">Explora nuestra colección de artículos premium diseñados para mejorar tu
                        estilo de vida. Desde moda hasta tecnología, encuentra todo lo que necesitas con ofertas exclusivas
                        y envío rápido.
                    </p>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="200">

                        <a href="#categories" class="btn-secondary">Explorar Categorias</a>
                    </div>
                    <div class="features-list" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <span>
                                Envío gratis</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-award"></i>
                            <span>Garantía de calidad</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-headset"></i>
                            <span>Soporte 24/7</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-visuals">
                <div class="product-showcase" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-card featured">
                        <img src="assets/img/product/product-2.webp" alt="Featured Product" class="img-fluid">
                        <div class="product-badge">Mejor Vendido</div>
                        <div class="product-info">
                            <h4>Auriculares Inalámbricos Premium</h4>
                            <div class="price">
                                <span class="sale-price">$299</span>
                                <span class="original-price">$399</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-grid">
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="400">
                            <img src="assets/img/product/product-3.webp" alt="Product" class="img-fluid">
                            <span class="mini-price">$89</span>
                        </div>
                        <div class="product-mini" data-aos="zoom-in" data-aos-delay="500">
                            <img src="assets/img/product/product-5.webp" alt="Product" class="img-fluid">
                            <span class="mini-price">$149</span>
                        </div>
                    </div>
                </div>

                <div class="floating-elements">
                    <div class="floating-icon cart" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-cart3"></i>
                        <span class="notification-dot">3</span>
                    </div>
                    <div class="floating-icon wishlist" data-aos="fade-up" data-aos-delay="700">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="floating-icon search" data-aos="fade-up" data-aos-delay="800">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->
    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Nuestros Productos</h2>
          <p>Compra ahora y disfruta de los mejores productos del mercado.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row g-5">

            <!-- Producto-->
            @foreach ($productos as $producto)
            <div class="col-lg-3 col-md-6">
                <div class="product-item">
                  <div class="product-image">
                    <img src="assets/img/product/product-4.webp" alt="Product Image" class="img-fluid" loading="lazy">
                    <div class="product-actions">
                      <button class="action-btn wishlist-btn">
                        <i class="bi bi-heart"></i>
                      </button>
                      <button class="action-btn quickview-btn">
                        <i class="bi bi-zoom-in"></i>
                      </button>
                    </div>
                    <button class="cart-btn">Agregar al Carrito</button>
                  </div>
                  <div class="product-info">
                    <div class="product-category">{{ $producto->nombre }}</div>
                    <h4 class="product-name"><a href="product-details.html">{{ $producto->descripcion_corta }}</a></h4>
                    <div class="product-rating">
                      <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                      </div>
                      <span class="rating-count">(38)</span>
                    </div>
                    <div class="product-price">
                      {{-- <span class="old-price">$240.00</span> --}}
                      <span class="current-price">{{ $producto->precio_venta }}</span>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>

      </section><!-- /Best Sellers Section -->

@endsection

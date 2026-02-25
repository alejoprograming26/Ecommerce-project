@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">Mis productos Favoritos</h1>
        </div>
      </div><!-- End Page Title -->

      <!-- Account Section -->
      <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <!-- Mobile Menu Toggle -->
          <div class="mobile-menu d-lg-none mb-4">
            <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
              <i class="bi bi-grid"></i>
              <span>Menu</span>
            </button>
          </div>

          <div class="row g-4">
            <!-- Profile Menu -->
            <div class="col-lg-3">
              <div class="profile-menu collapse d-lg-block" id="profileMenu">
                <!-- User Info -->
                <div class="user-info" data-aos="fade-right">
                  <div class="user-avatar">
                 <img src="{{ asset('storage/'. $ajuste->logo) }}" alt="Profile" loading="lazy">
                    <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                  </div>
                  <h4>{{Auth::user()->name}}</h4>
                  <div class="user-status">
                    <i class="bi bi-award"></i>
                    <span>{{Auth::user()->roles()->pluck('name')->implode(', ')}}</span>
                  </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="menu-nav">
                  <ul class="nav flex-column" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                        <i class="bi bi-box-seam"></i>
                        <span>Mis Productos </span>
                        <span class="badge">{{$productoFavoritos->count()}}</span>
                      </a>
                    </li>
                </nav>
              </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
              <div class="content-area">
                <div class="tab-content">
                  <!-- Orders Tab -->
                  <div class="tab-pane fade show active" id="orders">
                    <div class="section-header" data-aos="fade-up">
                        <h2>Mis Productos Favoritos</h2>
                    </div>
                    <div class="wishlist-grid">
                        @foreach ($productoFavoritos as $productoFavorito)
                        <div class="wishlist-card" data-aos="fade-up" data-aos-delay="200">
                            <div class="wishlist-image">
                                @php
                                    $imagen_producto = $productoFavorito->producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                              <img src="{{ asset('storage/' . $imagen)}}" alt="Product" loading="lazy">
                              <button class="btn-remove" type="button" aria-label="Remove from wishlist">
                                <i class="bi bi-trash"></i>
                              </button>
                              <form action="{{ url('/favoritos/'.$productoFavorito->id) }}" method="POST"
                                class="delete-form" style="display: inline;"
                                data-item-name="el Producto '{{ $productoFavorito->producto->nombre }}'">
                                @csrf
                                @method('DELETE')
                                <button class="btn-remove" type="submit" aria-label="Remove from wishlist">
                                    <i class="bi bi-trash"></i>
                                  </button>
                            </form>
                              <div class="sale-badge">{{ $productoFavorito->producto->stock }} disponibles</div>
                            </div>
                            <div class="wishlist-content">
                              <a href="{{ url('/producto/' . $productoFavorito->producto->id)}}">
                                <h4>{{ $productoFavorito->producto->nombre }}</h4>
                              </a>
                              <div class="product-meta">
                                <div class="rating">
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star-fill"></i>
                                  <i class="bi bi-star"></i>
                                  <span>(4.0)</span>
                                </div>
                                <div class="price">
                                  <span class="current">{{$productoFavorito->producto->precio_venta}} {{ $ajuste->divisa}}</span>
                                </div>
                              </div>

                              <form action="{{ url('/carrito/agregar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $productoFavorito->producto->id }}">
                                <input type="hidden" name="cantidad" value="1">
                                <button type="submit" class="btn-add-cart">
                                    <i class="bi bi-cart3"></i>  Añadir al carrito
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
          </div>

        </div>

      </section><!-- /Account Section -->

@endsection

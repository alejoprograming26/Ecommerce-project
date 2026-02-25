@extends('layouts.web')

@section('content')


    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">Carritos de Compras</h1>
        </div>
      </div><!-- End Page Title -->

      <!-- Cart Section -->
      <section id="cart" class="cart section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <div class="cart-items">
                <div class="cart-header d-none d-lg-block">
                  <div class="row align-items-center">
                    <div class="col-lg-6">
                      <h5>Prductos</h5>
                    </div>
                    <div class="col-lg-2 text-center">
                      <h5>Precios</h5>
                    </div>
                    <div class="col-lg-2 text-center">
                      <h5>Cantidad</h5>
                    </div>
                    <div class="col-lg-2 text-center">
                      <h5>Subtotal</h5>
                    </div>
                  </div>
                </div>
                     @php
                         $total=0;
                     @endphp
                     @foreach ($carritos  as $carrito)
                           <!-- Cart Item 1 -->
                           <div class="cart-item">
                            <div class="row align-items-center">
                              <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                                <div class="product-info d-flex align-items-center">
                                  <div class="product-image">
                                 @php
                                    $imagen_producto = $carrito->producto->imagenes->first();
                                    $imagen = $imagen_producto->imagen ?? '';
                                @endphp
                                    <img src="{{ asset('storage/' . $imagen)}}" alt="Product" class="img-fluid" loading="lazy">
                                  </div>
                                  <div class="product-details">
                                    <h6 class="product-title">{{$carrito->producto->nombre}}</h6>
                                    <div class="product-meta">
                                      <span class="product-color">{{$carrito->producto->descripcion_corta}}</span>
                                      <span class="badge bg-danger"> {{$carrito->producto->stock}} Disponibles</span>
                                    </div>
                                    <button class="remove-item" type="button">
                                      <i class="bi bi-trash"></i> Remove
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="price-tag">
                                  <span class="current-price">{{$carrito->producto->precio_venta}} {{$ajuste->divisa}}</span>
                                </div>
                              </div>
                              <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="quantity-selector">
                                  <button class="quantity-btn decrease">
                                    <i class="bi bi-dash"></i>
                                  </button>
                                  <input type="number" class="quantity-input" value="{{ $carrito->cantidad }}" min="1" max="{{ $carrito->producto->stock }}">
                                  <button class="quantity-btn increase">
                                    <i class="bi bi-plus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                <div class="item-total">
                                     @php
                                         $subtotal = $carrito->producto->precio_venta * $carrito->cantidad;
                                         $total=$total+$subtotal;
                                     @endphp
                                  <span>{{ $subtotal}} {{$ajuste->divisa}}</span>
                                </div>
                              </div>
                            </div>
                          </div><!-- End Cart Item -->
                     @endforeach


                <div class="cart-actions">
                  <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                    </div>
                    <div class="col-lg-6 text-md-end">
                      <button class="btn btn-outline-heading me-2">
                        <i class="bi bi-arrow-clockwise"></i> Actualizar Carrito
                      </button>
                      <button class="btn btn-outline-remove">
                        <i class="bi bi-trash"></i> Limpiar Carrito
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="cart-summary">
                <h4 class="summary-title">Resumen del Pedido</h4>

                <div class="summary-total">
                  <span class="summary-label">Total</span>
                  <span class="summary-value">{{$total}} {{$ajuste->divisa}}</span>
                </div>

                <div class="checkout-button">
                  <a href="#" class="btn btn-accent w-100">
                    Realizar Pago <i class="bi bi-arrow-right"></i>
                  </a>
                </div>

                <div class="continue-shopping">
                  <a href="{{ url('/') }}" class="btn btn-link w-100">
                    <i class="bi bi-arrow-left"></i> Continua Comprando
                  </a>
                </div>

                <div class="payment-methods">
                  <p class="payment-title">We Accept</p>
                  <div class="payment-icons">
                    <i class="bi bi-credit-card"></i>
                    <i class="bi bi-paypal"></i>
                    <i class="bi bi-wallet2"></i>
                    <i class="bi bi-bank"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </section><!-- /Cart Section -->
@endsection

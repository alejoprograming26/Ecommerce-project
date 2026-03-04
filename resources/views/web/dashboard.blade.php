@extends('layouts.web')

@section('content')
      <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Mi Cuenta</h1>
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
                        <span>Mis Pedidos </span>
                        <span class="badge">{{$total_pedidos}}</span>
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
                    <h2>Mis Pedidos</h2>
                  </div>

                  <div class="orders-grid">
                    <!-- Order Card 1 -->
                    <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                      <div class="order-header">
                        <div class="order-id">
                          <span class="label">Order ID:</span>
                          <span class="value">#ORD-2024-1278</span>
                        </div>
                        <div class="order-date">Feb 20, 2025</div>
                      </div>
                      <div class="order-content">
                        <div class="product-grid">
                          <img src="assets/img/product/product-1.webp" alt="Product" loading="lazy">
                          <img src="assets/img/product/product-2.webp" alt="Product" loading="lazy">
                          <img src="assets/img/product/product-3.webp" alt="Product" loading="lazy">
                        </div>
                        <div class="order-info">
                          <div class="info-row">
                            <span>Status</span>
                            <span class="status processing">Processing</span>
                          </div>
                          <div class="info-row">
                            <span>Items</span>
                            <span>3 items</span>
                          </div>
                          <div class="info-row">
                            <span>Total</span>
                            <span class="price">$789.99</span>
                          </div>
                        </div>
                      </div>
                      <div class="order-footer">
                        <button type="button" class="btn-track" data-bs-toggle="collapse" data-bs-target="#tracking1" aria-expanded="false">Track Order</button>
                        <button type="button" class="btn-details" data-bs-toggle="collapse" data-bs-target="#details1" aria-expanded="false">View Details</button>
                      </div>

                      <!-- Order Tracking -->
                      <div class="collapse tracking-info" id="tracking1">
                        <div class="tracking-timeline">
                          <div class="timeline-item completed">
                            <div class="timeline-icon">
                              <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Order Confirmed</h5>
                              <p>Your order has been received and confirmed</p>
                              <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                            </div>
                          </div>

                          <div class="timeline-item completed">
                            <div class="timeline-icon">
                              <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Processing</h5>
                              <p>Your order is being prepared for shipment</p>
                              <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                            </div>
                          </div>

                          <div class="timeline-item active">
                            <div class="timeline-icon">
                              <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Packaging</h5>
                              <p>Your items are being packaged for shipping</p>
                              <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                            </div>
                          </div>

                          <div class="timeline-item">
                            <div class="timeline-icon">
                              <i class="bi bi-truck"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>In Transit</h5>
                              <p>Expected to ship within 24 hours</p>
                            </div>
                          </div>

                          <div class="timeline-item">
                            <div class="timeline-icon">
                              <i class="bi bi-house-door"></i>
                            </div>
                            <div class="timeline-content">
                              <h5>Delivery</h5>
                              <p>Estimated delivery: Feb 22, 2025</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Order Details -->
                      <div class="collapse order-details" id="details1">
                        <div class="details-content">
                          <div class="detail-section">
                            <h5>Order Information</h5>
                            <div class="info-grid">
                              <div class="info-item">
                                <span class="label">Payment Method</span>
                                <span class="value">Credit Card (**** 4589)</span>
                              </div>
                              <div class="info-item">
                                <span class="label">Shipping Method</span>
                                <span class="value">Express Delivery (2-3 days)</span>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Items (3)</h5>
                            <div class="order-items">
                              <div class="item">
                                <img src="assets/img/product/product-1.webp" alt="Product" loading="lazy">
                                <div class="item-info">
                                  <h6>Lorem ipsum dolor sit amet</h6>
                                  <div class="item-meta">
                                    <span class="sku">SKU: PRD-001</span>
                                    <span class="qty">Qty: 1</span>
                                  </div>
                                </div>
                                <div class="item-price">$899.99</div>
                              </div>

                              <div class="item">
                                <img src="assets/img/product/product-2.webp" alt="Product" loading="lazy">
                                <div class="item-info">
                                  <h6>Consectetur adipiscing elit</h6>
                                  <div class="item-meta">
                                    <span class="sku">SKU: PRD-002</span>
                                    <span class="qty">Qty: 2</span>
                                  </div>
                                </div>
                                <div class="item-price">$599.95</div>
                              </div>

                              <div class="item">
                                <img src="assets/img/product/product-3.webp" alt="Product" loading="lazy">
                                <div class="item-info">
                                  <h6>Sed do eiusmod tempor</h6>
                                  <div class="item-meta">
                                    <span class="sku">SKU: PRD-003</span>
                                    <span class="qty">Qty: 1</span>
                                  </div>
                                </div>
                                <div class="item-price">$129.99</div>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Price Details</h5>
                            <div class="price-breakdown">
                              <div class="price-row">
                                <span>Subtotal</span>
                                <span>$1,929.93</span>
                              </div>
                              <div class="price-row">
                                <span>Shipping</span>
                                <span>$15.99</span>
                              </div>
                              <div class="price-row">
                                <span>Tax</span>
                                <span>$159.98</span>
                              </div>
                              <div class="price-row total">
                                <span>Total</span>
                                <span>$2,105.90</span>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Shipping Address</h5>
                            <div class="address-info">
                              <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States</p>
                              <p class="contact">+1 (555) 123-4567</p>
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
        </div>

      </div>

    </section><!-- /Account Section -->

@endsection

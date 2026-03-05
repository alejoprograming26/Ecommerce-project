@extends('layouts.web')

@section('content')
      <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Ajustes de Mi Cuenta</h1>
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
                      <a class="nav-link active" data-bs-toggle="tab" href="#settings">
                        <i class="bi bi-box-seam"></i>
                        <span>Ajustes </span>
                      </a>
                    </li>
                </nav>
              </div>
            </div>


          <!-- Content Area -->
          <div class="col-lg-9">
            <div class="content-area">
              <div class="tab-content">
               <div class="tab-pane fade show active" id="settings">
                  <div class="section-header" data-aos="fade-up">
                    <h2>Ajustes de Cuenta</h2>
                  </div>

                  <div class="settings-content">
                    <!-- Personal Information -->
                    <div class="settings-section" data-aos="fade-up">
                      <h3>Información Personal</h3>
                      <form class="php-email-form settings-form">
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label for="firstName" class="form-label">Nombre del Usuario</label>
                            <input type="text" class="form-control" id="firstName" value="{{Auth::user()->name}}" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" required="">
                          </div>
                        </div>

                        <div class="form-buttons">
                          <button type="submit" class="btn-save">Guardar Cambios</button>
                        </div>
                      </form>
                    </div>
                    
                    <!-- Security Settings -->
                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                      <h3>Seguridad</h3>
                      <form class="php-email-form settings-form">
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label for="newPassword" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="newPassword" required="">
                          </div>
                          <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirmPassword" required="">
                          </div>
                        </div>

                        <div class="form-buttons">
                          <button type="submit" class="btn-save">Actualizar Contraseña</button>
                        </div>

                      </form>
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

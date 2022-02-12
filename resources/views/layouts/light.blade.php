<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>SISRAD</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </style>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-light" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{asset('../resources/img/logo/mi_tec_blue.png')}}" alt="mi-tec-logo" height="50px" >
                </a>
                
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- @guest
                      @if( @auth
                          
                      @endauth)
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('docente.index') }}">{{ __('Docente') }}</a>
                          </li>
                      </ul>
                      @endif
                    @endguest --}}
                    @auth
                      @if (Auth::user()->typeUser  == "1")
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('reporte.index') }}">{{ __('Mis reportes') }}</a>
                          </li>
                        </ul>
                        @csrf
                      @endif
                      @if (Auth::user()->typeUser  == "2")
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('administrativo') }}">{{ __('Administrativo') }}</a>
                            </li>
                          </ul>
                        @csrf
                      @endif
                      @if (Auth::user()->typeUser  == "3")
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('docente.index') }}">{{ __('Docente') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('docente.index') }}">{{ __('Administrativo') }}</a>
                          </li>
                        </ul>
                        @csrf
                      @endif
                      @if (Auth::user()->typeUser  == "4")
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('reporte.index') }}">{{ __('Docente') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('docente.index') }}">{{ __('Administrativo') }}</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('docente.index') }}">{{ __('Panel de control') }}</a>
                          </li>
                        </ul>
                        @csrf
                      @endif
                      
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{url('docente/show') }}">Mi perfil</a>  
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5 bg-light" style="padding: 20px">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4" style="color: #000">
              <i class="fas fa-gem me-3"></i>SISRAD
            </h6>
            <p>
              Garantizar el apoyo en la gestion de actividades de la practica docente es nuetra mision.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4" style="color: #000">
              Redes sociales
            </h6>
            <p>
              <a href="#!" class="text-reset">Facebook</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Twitter</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Youtube</a>
            </p>
            {{-- <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p> --}}
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" >
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4" style="color: #000">
              Links de apoyo
            </h6>
            <p>
              <a href="#!" class="text-reset">¿Quienes somos?</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Soporte tecnico</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Ayuda</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4" style="color: #000">
              Contacto
            </h6>
            <p><i class="fas fa-home me-3"></i>Corea del Sur 600, Lomas del Coapinole, 48338 Puerto Vallarta, Jal.</p>
            <p><i class="fas fa-phone me-3"></i> + 52 322 226 5600 Ext 104 o 156</p>
            {{-- <p><i class="fas fa-print me-3"></i> Ext 104 o 156</p> --}}
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
    <div style="display: flex; justify-content: center">
      <img src="{{asset('/assets/banner-tec.jpg')}}" alt="banner" width="100%" >
      <img src="{{asset('../../resources/img/trabajando.jpg')}}" alt="banner" width="100%" >
      {{-- <img src="{{asset('assets/banner-tec.jpg')}}" alt="banner" width="100%" > --}}
    </div>
  </footer>
  
  <!-- Footer -->
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- BS5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{('css/dashboard.css')}}">

    {{-- Materials --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-light sticky-top bg-light p-0 shadow" aria-label="Second navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/')}}"><img src="img/logo-pt.png" width="36px" height="28" alt="">My Drink</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample02">
          <form>
            <div class="nav-item dropdown dropdown-menu-right">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
             
                {{-- <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a></li> --}}
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li>
              </ul>
            </div>
            <div class="nav-item dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          </form>
        </div>
      </div>
    </nav>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <div class="dropdown-item">
        {{-- <a class="nav-link px-3" href="{{ route('profile.index')}}">{{ Auth::user()->name }}</a> --}}
      </div>
      <div class="dropdown-item">
        <a class="nav-link px-3" href="{{ route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}>
        </a>
      </div>
    </div>
</header>

<div class="container-fluid">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
          <a class="nav-link active d-flex justify-content-start align-items-center" aria-current="page" href="{{ route('home')}}">
            <span class="me-2 material-icons-outlined">home</span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link d-flex justify-content-start align-items-center" href="{{ route('user.index')}}"> --}}
            <span class="me-2 material-icons-outlined">person</span>
            Pelanggan
          </a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link d-flex justify-content-start align-items-center" href="{{ route('product.index')}}"> --}}
            <span class="me-2 material-icons-outlined">inventory_2</span>
            Products
          </a>
        </li>
        @endif
        <li class="nav-item">
          {{-- <a class="nav-link d-flex justify-content-start align-items-center" href="{{ route('produk.index')}}"> --}}
            <span class="me-2 material-icons-outlined">category</span>
            Katalog
          </a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link d-flex justify-content-start align-items-center" href="{{ route('transaction.index')}}"> --}}
            <span class="me-2 material-icons-outlined">list_alt</span>
            Transaksi
          </a>
        </li>

      </ul>
      
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Pengaturan</span>
        <a class="link-secondary" href="#">
          <span class="material-icons-outlined">settings</span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          {{-- <a class="dropdown-item d-flex justify-content-start align-items-center my-1" href="{{ route('profile.index')}}"> --}}
            <i class="me-2 material-icons-outlined">
                person
            </i>
            Profil
        </a>
        </li>
          <a class="dropdown-item d-flex justify-content-start align-items-center my-1 text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            <i class="me-2 material-icons-outlined text-danger">
              logout
            </i>
                {{ __('Logout') }}
          </a>
          {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
              @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>
  <main class="col-md-9 ms-sm-auto mt-4 col-lg-10 px-md-4">
    {{-- section --}}
    @yield('content')
  </main>
</div>
    
      
  

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

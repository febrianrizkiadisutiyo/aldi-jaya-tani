<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Aldi Jaya Tani</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajak/libs/font-awesome/5.13.0/js/all.min.js"></script> --}}
    {{-- asset --}}
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    {{-- <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
    crossorigin="anonymous"/> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="text-center">
                    <img src="logo aldi jaya tani.png" width="150px" height="150px"class="rounded-circle">
                </div>
                <p>Aldi Jaya Tani</p>
            </div>      
            <div id="line"></div>
            <div id="which">Pilih Menu</div>
            <div class="list">
                <li>
                    <a href="/home">
                        <i class="bi bi-house mr-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="#1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="bi bi-box-seam mr-2"></i>
                        Produk
                    </a>
                    <ul class="collapse" id="1">
                        <li class="hover">
                            <a href="satuanProduk"><span class="set-size">Satuan Produk</span></a>
                        </li>
                        <li class="hover">
                            <a href="produk"><span class="set-size">Data Produk</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="bi bi-wallet2 mr-2"></i>
                        Transaksi
                    </a>
                    <ul class="collapse" id="2">

                        <li class="hover">
                            <a href="/produkMasuk"><span class="set-size">Produk Masuk</span> </a>
                        </li>
                        <li class="hover">
                            <a href="/produkKeluar"><span class="set-size">Produk Keluar</span></a>
                        </li>
                    </ul>

                </li>
                @if (auth()->user()->role == 'pemilikToko')
                <div id="which">Laporan</div>
                <li>
                    <a href="#3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="bi bi-clipboard-check mr-2"></i>
                        Laporan
                    </a>
                    <ul class="collapse" id="3">
                        <li class="hover">
                            <a href="laporanProduk"><span class="set-size">Laporan Data Produk</span></a>
                        </li>
                        <li class="hover">
                            <a href="laporanMasuk"><span class="set-size"> Laporan Produk Masuk</span></a>
                        </li>
                        <li class="hover">
                            <a href="laporanKeluar"><span class="set-size"> Laporan Produk Keluar</span></a>
                        </li>
                    </ul>
                </li>
                {{-- <div class="btn-group dropup">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Buat Akun
                    </button>
                    <ul class="dropdown-menu">
                        
                      <a href="/buatakun"><i class="bi bi-plus-lg"></i> akun</a>
                    </ul>
                  </div> --}}
                @endif
            </div>
            {{-- <li>
                <i class="bi bi-house mr-2"></i>
                <a href="#">Dashboard</a>
            </li>
            <li class="">
                <a href="#1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Produk</a>
                <ul class="collapse" id="1">
                    <li>                                                                                    
                        <a href="coba">Jenis Produk</a>
                    </li>
                    <li>
                        <a href="/satuanProduk">Satuan Produk</a>
                    </li>
                    <li>
                        <a href="/produk">Data Produk</a>
                    </li>
                </ul>      
            </li>
            <li>
                <a href="#2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transaksi</a>
                <ul class="collapse" id="2">
                    <li>                                                                                    
                        <a href="#">Produk Masuk</a>
                    </li>
                </ul>   
            </li>
            <li>
                <a href="#3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Laporan</a>
                <ul class="collapse" id="3">
                    <li>                                                                                    
                        <a href="#">laporan Produk</a>
                    </li>
                    <li>
                        <a href="#">Laporan Transaksi</a>
                    </li>
                </ul>   
        </li>  --}}
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
                <div class="container">

                    <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                        <span>></span>
                    </span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
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
                                    <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" >
                                        <h5 class="dropdown-item mb-3">{{ Auth::user()->role }}</h5>
                                        
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <button class="btn btn-success">
                                                {{ __('Logout') }}
                                            </button>                 
                                            </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <br><br>
            @yield('content')
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $("#sidebarCollapse").on('click', function() {
                $("#sidebar").toggleClass('active')
                $("#content").toggleClass('active')
            })
        })
    </script>

</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Style --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @if (Auth::check())
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #9747FF;">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand text-white" href="{{ route('home') }}">
                    <h4 class="m-0 p-0">LokerMania</h4><small>For employers</small>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    style="color: white;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
                    <hr class="d-block d-lg-none text-white">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page"
                                href=" {{ route('show_applicant') }} ">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href=" {{ route('create_job') }}">Pasang Loker</a>
                        </li>
                        <li class="nav-item me-0 me-lg-3">
                            <a class="nav-link text-white" href=" {{ route('about_us') }}">Tentang Kami</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown nav-item border-start ps-lg-0 ps-3 d-lg-flex justify-content-center align-items-center"
                                style="cursor: pointer; ">
                                <a id="navbarDropdown" class="nav-link gap-1 align-items-center d-flex dropdown-toggle"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <div class="rounded-circle d-flex overflow-hidden">
                                        @if (Auth::user()->image == null)
                                            <img class="card-title" src=" {{ url('storage/user-icon.png') }} "
                                                alt="" width="35">
                                        @else
                                            <img class="card-title" src=" {{ url('storage/' . Auth::user()->image) }} "
                                                alt="" width="35">
                                        @endif
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <a class="dropdown-item" href="{{ route('show_profile') }}">
                                            Profile
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
        <!-- end navbar -->
    @else
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top"
            style="box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.30);
 -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.30);
 -moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.30);">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand fw-bold" href="{{ route('show_jobs') }}" style="color: #6F00FF;">LokerMania</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="  {{ route('jobs_search') }} " style="color: #9747FF;">Info
                                Loker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="  {{ route('create_job') }}  " style="color: #9747FF;">Pasang
                                Loker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('about_us') }} " style="color: #9747FF;">Tentang
                                Kami</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <a class="dropdown-item" href="{{ route('show_profile') }}">
                                            Profile
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
        <!-- end navbar -->
    @endif

    <main class="py-4">
        @yield('content')
    </main>

    <!-- footer -->
        <!-- footer -->
        <div class="container-fluid position-relative" style="margin-top: 80px; background-color: #9747FF;">
            <img src="/assets/vector/vektor-footer.png" alt="" class="d-none d-md-block position-absolute top-0 end-0" style="height: calc(100% - 20px); width: 60%;">
            <div class="container position-relative py-5">
              <div class="d-grid grid-cols-4-large">
                <div class="col-span-2-large text-white">
                  <h5 class="fw-bold pb-2">LokerMania</h5>
                  <div class="pb-2">
                    <p class="w-75">LokerMania adalah website yang membantu kamu untuk memilih atau merekomendasikan pekerjaan yang kamu inginkan</p>
                  </div>
                  <div class="d-flex gap-2 my-3">
                    <img src="/assets/vector/facebook.png" alt="" width="28px" class="sosmedFooter">
                    <img src="/assets/vector/twitter.png" alt="" width="28px" class="sosmedFooter">
                    <img src="/assets/vector/instagram.png" alt="" width="28px" class="sosmedFooter">
                    <img src="/assets/vector/whatsapp.png" alt="" width="28px" class="sosmedFooter">
                  </div>
                </div>
                <div class="mt-3 mt-md-0 textWhiteSmall">
                  <h5 class="pb-2">Pages</h5>
                  <a href="{{ route('jobs_search') }}" class="d-block text-black textWhiteSmall linkHover mt-2" style="max-width: max-content;">Info Loker</a>
                  <a href="{{ route('create_job') }}" class="d-block text-black textWhiteSmall linkHover mt-2" style="max-width: max-content;">Pasang Loker</a>
                  <a href="{{ route('about_us') }}" class="d-block text-black textWhiteSmall linkHover mt-2" style="max-width: max-content;">Tentang Kami</a>
                </div>
                <div class="mt-3 mt-md-0 bgWhite-Small rounded-4 p-3 p-md-0">
                  <h5>Contact</h5>
                  <div class="d-flex flex-row align-items-center gap-2 mt-2">
                    <img src="/assets/vector/call.png" alt="" class="" height="20px">
                    <p class="text-truncate mb-0">081 234 567 89</p>
                  </div>
                  <div class="d-flex flex-row align-items-center gap-2 mt-2">
                    <img src="/assets/vector/mail.png" class="" alt="" width="20px">
                    <p class="text-truncate mb-0">lokermania@gmail.com</p>
                  </div>
                  <div class="d-flex flex-row align-items-center gap-2 mt-2">
                    <img src="/assets/vector/solid-location.png" class="" alt="" width="20px">
                    <p class="text-truncate mb-0">Denpasar Utara</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="../assets/js/script.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>

{{-- @if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
@endif --}}

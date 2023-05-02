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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        input,
        textarea {
            background: white;
        }
        body{
          color: white;
        }
    </style>
</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top" style="background-color:#9747FF;">
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
                        style="cursor: pointer;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (Auth::user()->image == null)
                                <img class="card-title" src=" {{ url('storage/user-icon.png') }} " alt=""
                                    width="35">
                            @else
                                <img class="card-title" src=" {{ url('storage/' . Auth::user()->image) }} "
                                    alt="" width="35">
                            @endif
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
    <div class="container-fluid"style="margin-top: 10em; margin-bottom: 7em;">
        <div class="container border rounded-5" style="background: #9747FF;">
            <h4 class="text-center text-capitalize py-5">Lengkapi form untuk pasang loker</h4>
            <form action=" {{ route('store_job') }} " method="POST" class="px-5 py-4">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="nameJob ">Nama Pekerjaan</label>
                        <input type="text" name="title" class="border w-100 rounded px-3 py-2 mt-1" id="nameJob"
                            placeholder="Job title">
                    </div>
                    <div class="col">
                        <label for="salary">Gaji</label>
                        <input type="text" name="salary" class="border w-100 rounded px-3 py-2 mt-1" id="salary"
                            placeholder="xxxxxxxxx">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="qualification">Kualifikasi</label> <br />
                        <input type="number" class="border col-sm-12 col-lg-2 rounded px-3 py-2 mt-1"
                            id="qualification" placeholder="3">
                    </div>
                    <div class="col">
                        <label for="graduate">Lulusan</label>
                        <input type="text" name="graduates" class="border w-100 rounded px-3 py-2 mt-1"
                            id="graduate" placeholder="SMA, SMK, D1, D3, S1">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="border w-100 rounded px-3 py-2 mt-1"
                                    placeholder="kulaifikasi" name="requirements[]">
                            </div>
                            <div class="col-12">
                                <input type="text" class="border w-100 rounded px-3 py-2 mt-1"
                                    placeholder="kulaifikasi" name="requirements[]">
                            </div>
                            <div class="col">
                                <input type="text" class="border w-100 rounded px-3 py-2 mt-1"
                                    placeholder="kulaifikasi" name="requirements[]">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12">
                                <label for="major">Jurusan</label>
                                <input type="text" name="major" class="border w-100 rounded px-3 py-2 mt-1"
                                    id="major" placeholder="Informatika, Hukum">
                            </div>
                            <div class="col-12">
                                <label for="experience">Pengalaman</label>
                                <input type="text" name="experiences" class="border w-100 rounded px-3 py-2 mt-1"
                                    id="experience" placeholder="1 tahun">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 col-sm-12">
                        <label for="description">Deskripsi Pekerjaan</label>
                        <textarea name="description" id="description" cols="30" rows="10" style="resize: unset;"
                        class="form-control">  </textarea>
                    </div>
                    <div class="col-6">
                        <label for="job_function">Jenis Perkerjaan</label>
                        <input type="text" name="job_function" class="border w-100 rounded px-3 py-2 mt-1"
                            id="job_function" placeholder="IT, Apoteker, Developer">
                    </div>
                    
                </div>
                <div class="row mt-5">
                    <div class="col d-flex gap-4">
                        <button type="submit" class="btn btn-warning fs-5 px-4">
                            Submit
                        </button>
                        <button class="btn btn-danger fs-5 px-4">
                            Kembali
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end form -->
</body>

</html>

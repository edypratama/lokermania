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
</head>

<body>
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
    <!-- end navbar -->
    <!-- header -->
    <div class="container-fluid border-bottom w-100 position-relative" style="min-height: 100vh; height: 657px;">
        <img src="../assets/vector/vektor-post-job3.png" alt=""
            class="w-100 position-absolute start-0 bottom-0">
        <div class="container h-100 d-flex justify-content-start align-items-center w-100">
            <div class="row gap-3 w-100">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-center">
                        <div class="rounded-circle overflow-hidden" style="width: 200px">
                        @if ($job->user->image == null)
                            <img class="card-title" src=" {{ url('storage/user-icon.png') }} " alt=""
                                width="200px">
                        @else
                            <img class="card-title" src=" {{ url('storage/' . $job->user->image) }} " alt=""
                                width="200px">
                        @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center-mb">
                    <h5> {{ $job->user->name }} </h5>
                    <h2> {{ $job->title }} </h2>
                    <small> {{ $date }}</small>
                    <div class="d-flex flex-column align-items-center-mb gap-2 mt-4">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex gap-2">
                                <img src="../assets/vector/wallet.png" alt="" />Rp.{{ $job->salary }}
                            </div>
                            <div class="d-flex gap-2">
                                <img src="../assets/vector/location.png" alt="" />{{ $job->user->provinsi }} - {{ $job->user->address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" style="max-width: 1126px;">
             <div class="modal-content">
                 <div class="modal-body">
                     <form action=" {{ route('store_apply', $job) }} " method="post"
                         enctype="multipart/form-data">
                         @csrf
                         @method('patch')
                         <div class="row">
                             <div class="col">
                                 <label for="name">Nama lengkap</label><br>
                                 <input class="border w-100 rounded px-3 py-2 mt-1" type="text" name="name" id="name">
                             </div>
                             <div class="col">
                                 <label for="Umur">Umur</label><br>
                                 <input class="border w-100 rounded px-3 py-2 mt-1" name="age" type="number" id="Umur">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <label for="email">Email</label><br>
                                 <input class="border w-100 rounded px-3 py-2 mt-1" name="email" type="email" id="email">
                             </div>
                             <div class="col">
                                 <label for="address">Alamat</label><br>
                                 <input class="border w-100 rounded px-3 py-2 mt-1" name="address" type="text" id="address">
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">
                                 <label for="phone">No Hp</label><br>
                                 <input class="border w-100 rounded px-3 py-2 mt-1" name="phone" type="text" id="phone">
                             </div>
                             <div class="col mt-3">
                                 <label for="cv">Upload CV</label>
                                 <input type="file" class="form-control" name="cv" id="cv">
                             </div>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="gender" value="male"
                                 id="flexRadioDefault1">
                             <label class="form-check-label" for="flexRadioDefault1">
                                 Male
                             </label>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="gender" value="female"
                                 id="flexRadioDefault2" checked>
                             <label class="form-check-label" for="flexRadioDefault2">
                                 Female
                             </label>
                         </div>
                 </div>
                 <div class="modal-footer d-flex justify-content-start" style="border: none;">
                     <button type="submit" name="submit" class="btn btn-primary rounded-pill"  data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Kirim</button>
                     <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal"
                     aria-label="Close">Batal</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>

        <!-- content -->
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <div class="col-lg-8 px-5 pt-5">
                    <div class="container border rounded-4 px-4 py-3 mt-5">
                        <div class="container-fluid">
                            <h3 class="text-uppercase text-center">Deskripsi Lowongan</h3>
                            <p class="mt-3"> {{ $job->description }} </p>
                        </div>
                        <hr>
                        <div class="container-fluid ">
                            <p class="fs-5">Kualifikasi</p>
                            <ul>
                                @foreach ($requirements as $item)    
                                <li class=""> {{ $item }} </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="container-fluid d-flex jbw gap-5">
                            <div class="">
                                <p class="" style="font-weight: 500;">Lulusan</p>
                                <small> {{ $job->graduates }} </small>
                            </div>
                            <div class="">
                                <p class="" style="font-weight: 500;">Jurusan</p>
                                <small>{{ $job->major }}</small>
                            </div>
                            <div class="">
                                <p class="" style="font-weight: 500;">Jenis Pekerjaan</p>
                                <small>{{$job->job_function}}</small>
                            </div>
                            <div class="">
                                <p class="" style="font-weight: 500;">Pengalaman</p>
                                <small>{{ $job->experiences }}</small>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-center mt-5">
                            <button class="btn btn-primary rounded-pill py-2 px-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="background: #9747FF">
                                Lamar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 bs-mb-sc px-5 py-5">
                    <hr class="d-block d-lg-none" />
                    <div class="container">
                        <h4 class="text-center pt-5 fw-bolder">Lowongan Pekerjaan Lain Dari {{ $job->user->name }}
                        </h4>
                        @foreach ($jobs as $data)
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <p class="p-0"> {{ $data->title }} </p>
                                <form action=" {{ route('job_detail', $data) }} " method="get">
                                    <button class="btn rounded-pill px-3 btn-primary" style="background: #9747FF"> <small>Detail</small> </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <!-- modal 2 -->
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center flex-column gap-2">
                        <img class="w-25" src="../assets/vector/centang.png" alt="">
                        <h4>Form berhasil dikirim</h4>
                        <p class="mb-3">Silahkan tunggu balasan email dari perusahaan yang dilamar</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </div>
</body>
</html>

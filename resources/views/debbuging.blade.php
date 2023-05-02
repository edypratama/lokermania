@extends('layouts.app')

@section('content')
    <div class="container-fluid height position-relative mt">
        <img src="../assets/vector/vektor-post-job3.png" alt="" class="position-absolute bottom-0 start-0 w-100"
            style="z-index: -1;">
        <div class="container h-100">
            <div class="row gap-5 d-flex justify-content-between align-items-center h-100">
                <div class="col-lg-6">
                    <h1 class="fw-bold text-center px-3">Temukan pekerjaan impian Anda</h1>
                </div>
                <div class="col">
                    <img src="../assets/vector/vektor4.png" alt="">
                </div>
            </div>
        </div>
        <div class="position-absolute" style="bottom: 30px; left: 50%; transform: translateX(-50%);">
            <form action=" {{ route('search') }} " method="GET">
                <div class="row rounded-3 p-4 gap-2"
                    style="max-width: 1000px; min-width: 1000px; background-color: #EAE7F2;">
                    <div class="col p-0 d-flex align-items-center" color: #949494;>
                        <img src="../assets/vector/vektor-search.png" alt="" height="30px">
                        <input type="text" class="form-control" style="background-color: transparent; border: none;"
                            placeholder="First name" aria-label="First name" name="q">
                    </div>
                    <div class="col p-0 d-flex" style="border-left: 3px solid #9747FF;">
                        <img src="../assets/vector/vektor-location.png" alt="" class="ms-3" height="30px">
                        <select class="form-select" style="background-color: transparent; border: none; color: #949494;"
                            aria-label="Default select example" name="qprov">
                            <option selected disabled>Pilih Lokasi yang diinginkan</option>
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatra Utara">Sumatra Utara</option>
                            <option value="Sumatra Selatan">Sumatra Selatan</option>
                            <option value="Sumatra Barat">Sumatra Barat</option>
                            <option value="Benkulu">Benkulu</option>
                            <option value="Riau">Riau</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Banten">Banten</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Yogjakarta">Yogjakarta</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Tengah">Papua Tengah</option>
                            <option value="Papua Selatan">Papua Selatan</option>
                            <option value="Papua Pegunungan">Papua Pegunungan</option>
                        </select>
                    </div>
                    <div class="col-1 p-0">
                        <button class="btn w-100" style="background-color: #9747FF; color: white;">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end header -->
    <!-- lowongan -->
    <div class="container-fluid height h-100-mb pt-5" style="background-color: rgb(151, 71, 255, 0.11);">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col">
                    <h2 class="">Temukan Lowongan Terbaru</h2>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <a class="ms-lg-5 ms-0 text-decoration-none" href="">Lihat semua</a>
                </div>
            </div>
            <div class="row mt-5">
                @if ($data->count() == 0)
                    <p>No jobs found.</p>
                @else
                    @foreach ($data as $job)
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top-card d-flex justify-content-between align-items-center">
                                        @if ($job->user->image == null)
                                            <img class="card-title" src=" {{ url('storage/user-icon.png') }} "
                                                alt="" width="100px">
                                        @else
                                            <img class="card-title" src=" {{ url('storage/' . $job->user->image) }} "
                                                alt="" width="100px">
                                        @endif
                                        <span class="text-success">Great match
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="mt-3"> {{ $job->user->name }} </p>
                                    <h5 class="mt-1 mb-3"> {{ $job->title }} </h5>
                                    <div class="d-flex flex-column gap-3 mb-5">
                                        <div class="d-flex align-items center gap-2">
                                            <img src="../assets/vector/wallet.png" alt="" class="icon-card" />Rp.
                                            {{ $job->salary }}
                                        </div>
                                        <div class="d-flex align-items center gap-2">
                                            <img src="../assets/vector/location.png" alt="" class="icon-card" />
                                            {{ $job->user->address }}
                                        </div>
                                    </div>
                                    <form action=" {{ route('job_detail', $job) }} " method="get">
                                        <button class="btn rounded-pill bg-primary px-4 text-white">
                                            Detail
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- end lowongan -->
    <div class="vh-100 mb"></div>
@endsection

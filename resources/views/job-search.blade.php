@extends('layouts.app')

@section('content')
<div class="container-fluid position-relative mx-100 vh-100Large" style="padding-top: 128px; min-height: 460px; max-height: 657px;">
    <img src="../assets/vector/vektor.png" alt="" class="position-absolute start-0 bottom-0 w-100" style="z-index: -1;">
      <div class="container h-100 pb-5 backdropHero">
        <div class="row d-flex align-items-center justify-content-between h-75">
          <div class="col col-md-5 text-black text-center">
            <h1 class="fw-bold">Temui Pekerjaan Impian Anda</h1>
            <!-- <p class="my-3 animationUp text-black fw-medium">LokerMania adalah situs lowongan kerja Nomor 1 di Indonesia. LokerMania berkomitmen untuk mengutamakan para pencari kerja, memberi mereka akses gratis untuk mencari lowongan,  mencari informasi tentang perusahaan</p> -->
          </div>
          <div class="col col-md-5 d-none d-md-block">
            <img src="../assets/vector/vektor4.png" alt="" class="w-75">
          </div>

          <form class="row gy-2 gy-md-0 mx-auto align-items-center border py-3 rounded-4" style="background-color: #EAE7F2; margin-top: 80px;" data-aos="fade-up" data-aos-duration="1500" action=" {{ route('search') }} " method="GET">
            <div class="col-sm-3 col-md">
              <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
              <div class="input-group">
                <div class="input-group-text" style="border: none; background-color: transparent;"><img src="../assets/vector/vektor-search.png" alt="" height="30px"></div>
                <input type="text" name="q" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username" style="border: none; background-color: transparent; border-radius: unset;">
              </div>
            </div>
            <div class="col-sm-3 col-md">
              <label class="visually-hidden" for="specificSizeSelect">Preference</label>
              <div class="input-group borderStart-Search">
                <div class="input-group-text" style="border: none; background-color: transparent;"><img src="../assets/vector/vektor-location.png" alt="" height="30px"></div>
                <select class="form-select" name="qprov" id="specificSizeSelect" style="border: none; border-radius: unset; background-color: transparent;">
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
            </div>
            <div class="col col-md-2 pt-3 pt-md-0">
              <button type="submit" class="btn py-md-3 w-100 text-white fw-bold" style="background-color: #9747FF;">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!-- lowongan terbaru -->
  <div class="container-fluid" style="padding-top: 128px; padding-bottom: 144px; background-color: #9747ff11;">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center h-100 mb-5">
        <h2 class="mb-0">Lowongan terbaru</h2>
        <a href="" class="d-block"><small>Lihat Semua</small></a>
      </div>
      <div class="d-grid grid-cols-4-large grid-cols-2-medium grid-cols-1 gap-2 gap-md-4">
        @foreach ($jobs_up as $job)
        <div class="px-3 py-4 border shadow-sm rounded-4">
            @if ($job->user->image == null)
                <img class="imgCard rounded-pill" src=" {{ url('storage/user-icon.png') }} " alt="" width="">
            @else
                <img class="imgCard rounded-pill" src=" {{ url('storage/' . $job->user->image) }} " alt=""
                    width="">
            @endif
            <p class="mt-2 mb-0 text-truncate">{{ $job->user->name }}</p>
            <h4 class="text-truncate">{{ $job->title }}</h4>
            <div class="d-flex flex-row align-items-center gap-2 mt-4">
                <img src="/assets/vector/wallet.png" alt="" class="h-25">
                <small>{{ $job->salary }}</small>
            </div>
            <div class="d-flex flex-row align-items-center gap-2 mt-2">
                <img src="/assets/vector/location.png" alt="" class="h-25">
                <small title="Bali, Jalan Seroja No. 36" class="text-truncate"> {{ $job->user->address }} -
                    {{ $job->user->provinsi }}</small>
            </div>
            <form action=" {{ route('job_detail', $job) }} " method="get">
                <button class="btn rounded-pill px-4 text-white mt-3" style="background-color: #9747FF;">
                    Detail
                </button>
            </form>
        </div>
    @endforeach
    </div>
  </div>

  <!-- lowongan pilihan -->
  <div class="container-fluid" style="padding-top: 128px; padding-bottom: 144px;">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center h-100 mb-5">
        <h2 class="mb-0">Lowogan Pilihan</h2>
        <a href="" class="d-block"><small>Lihat Semua</small></a>
      </div>
      <div class="d-grid grid-cols-4-large grid-cols-2-medium grid-cols-1 gap-2 gap-md-4">
        @foreach ($jobs as $job)
        <div class="px-3 py-4 border shadow-sm rounded-4">
            @if ($job->user->image == null)
                <img class="imgCard rounded-pill" src=" {{ url('storage/user-icon.png') }} " alt="" width="">
            @else
                <img class="imgCard rounded-pill" src=" {{ url('storage/' . $job->user->image) }} " alt=""
                    width="">
            @endif
            <p class="mt-2 mb-0 text-truncate">{{ $job->user->name }}</p>
            <h4 class="text-truncate">{{ $job->title }}</h4>
            <div class="d-flex flex-row align-items-center gap-2 mt-4">
                <img src="/assets/vector/wallet.png" alt="" class="h-25">
                <small>{{ $job->salary }}</small>
            </div>
            <div class="d-flex flex-row align-items-center gap-2 mt-2">
                <img src="/assets/vector/location.png" alt="" class="h-25">
                <small title="Bali, Jalan Seroja No. 36" class="text-truncate"> {{ $job->user->address }} -
                    {{ $job->user->provinsi }}</small>
            </div>
            <form action=" {{ route('job_detail', $job) }} " method="get">
                <button class="btn rounded-pill px-4 text-white mt-3" style="background-color: #9747FF;">
                    Detail
                </button>
            </form>
        </div>
    @endforeach
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('content')
    <!-- hero sect -->
    <div class="container-fluid position-relative imgHeroAbout mx-100 vh-100Large" style="padding-top: 128px; min-height: 460px; max-height: 657px;">
        <img src="../assets/vector/vektor.png" alt="" class="position-absolute start-0 bottom-0 w-100" style="z-index: -1;">
          <div class="container h-100 pb-5 backdropHero">
            <div class="row d-flex align-items-center h-75">
              <div class="col text-white backgroundHeroSecond text-start text-md-center">
                <h1 class="fw-bold" style="color: #9747FF;">LokerMania</h1>
                <p class="my-3 animationUp text-black fw-medium">LokerMania adalah situs lowongan kerja Nomor 1 di Indonesia. LokerMania berkomitmen untuk mengutamakan para pencari kerja, memberi mereka akses gratis untuk mencari lowongan, dan mencari informasi tentang perusahaan</p>
              </div>
              <div class="col d-none d-md-block">
                <img src="../assets/vector/vektor-about.png" alt="" class="w-100">
              </div>
            </div>
          </div>
        </div>
    
        <!-- VisiMisi Sect -->
        <div class="container-fluid" style="padding-top: 128px; padding-bottom: 144px;">
          <div class="container" data-aos="fade-up" data-aos-duration="1500">
            <div class="row">
              <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-center">
                <div class="card h-100 bgCardLarge textWhite-Large py-3 rounded-5" style="max-width: 400px; border: none;">
                  <div class="card-body text-md-center">
                    <h5 class="text-uppercase fw-bold underline-Small pb-1">visi</h5>
                    <p class="card-text mt-1">Menciptakan peluang ekonomi bagi talenta Indonesia</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 d-flex justify-content-center">
                <div class="card h-100 bgCardLarge textWhite-Large py-3 rounded-5" style="max-width: 400px; border: none;">
                  <div class="card-body text-md-center">
                    <h5 class="text-uppercase fw-bold underline-Small pb-1">Misi</h5>
                    <p class="card-text mt-1">Menyediakan wadah yang aman dan bermanfaat bagi talenta Indonesia untuk menjadi lebih produktif dan sukses</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- mengapa mencari kerja sect -->
        <div class="container-fluid" style="padding-top: 144px; padding-bottom: 128px;">
          <div class="container">
            <h3 class="fw-bold text-center mb-5">Mengapa Mencari Kerja Bersama <span style="color: #6F00FF;">LokerMania</span></h3>
            <div class="row justify-content-center gap-2">
              <div class="col-12 col-md" data-aos="fade-up" data-aos-duration="1500">
                <div class="card rounded-4 p-3">
                  <img src="../assets/vector/vektor-people.png" class="mx-auto" width="50%"  alt="">
                  <div class="card-body text-center">
                    <p class="fw-bold" style="color: #6F00FF;">Kami adalah Pilihan Pertama Para Pencari Kerja</p>
                    <small class="card-text">Akses 100.000 kandidat di Indonesia</small>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md" data-aos="fade-up" data-aos-duration="1500">
                <div class="card rounded-4 p-3">
                  <img src="../assets/vector/building.png" class="mx-auto" width="50%"  alt="">
                  <div class="card-body text-center">
                    <p class="fw-bold" style="color: #6F00FF;">Kami Dapat Dipercaya</p>
                    <small class="card-text">Dipercara 1 juta perusahaan di Indonesia</small>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md" data-aos="fade-up" data-aos-duration="1500">
                <div class="card rounded-4 p-3">
                  <img src="../assets/vector/transparan.png" class="mx-auto" width="50%"  alt="">
                  <div class="card-body text-center">
                    <p class="fw-bold" style="color: #6F00FF;">Transparan</p>
                    <small class="card-text">Terhubung dengan HRD atau pemilik usaha langsung</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- perhatian -->
        <div class="container-fluid" style="margin-top: 144px; margin-bottom: 128px; background-color: #EEE1FF;">
          <div class="container" data-aos="fade-up" data-aos-duration="1500">
            <div class="text-center py-5">
              <h4 class="fw-bold mb-5">Perhatian!</h4>
              <div>
                Banyak kasus <strong>penipuan</strong> lowongan kerja di luar Lokermania.
                Waspadalah terhadap perusahaan yang mewajibkan Anda untuk membayar dalam proses rekrutmen.
              </div>
              <div class="my-3">
                Lokermania berkomitmen untuk menjadi platform cari kerja yang aman, cepat, dan dekat.
                Semua lowongan kerja dan perusahaan yang ada di platform LokerMania telah melalui proses verifikasi keamanan.
              </div>
              <div>
                Apabila Anda memiliki masukan atau tanggapan, segera hubungi Lokermania pada <strong>
                  lokermania@gmail.com
                </strong>
              </div>
            </div>
          </div>
        </div>
@endsection

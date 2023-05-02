@extends('layouts.app')

@section('content')
 <!-- header -->
 <div class="container-fluid vh-100 position-relative">
    <div class="container h-100 d-lg-flex justify-content-between align-items-center position-relative z-1">
      <div class="title-header text-center-mb d-flex justify-content-center align-items-center flex-column h-100">
        <h1 class="">Rekrut Karyawan <br> Hebat Anda Berikutnya</h1>
        <div class="d-flex justify-content-center">
          <button class="btn rounded-pill px-3 py-2 mt-3" style=" background-color:#9747FF; color:white;  ">Pasang Loker</button>
        </div>
      </div>
      <img src="../assets/vector/vektor-post-job.png" alt="" class="d-none d-lg-block" width="500">
    </div>
    <img src="../assets/vector/vektor-post-job3.png" alt="" class="position-absolute start-0 bottom-0 w-100">
  </div>
  <!-- end header -->
  <!-- step by step -->
  <div class="container-fluid vh-100 mt">
    <div class="container d-flex justify-content-center align-items-center flex-column gap-5 h-100">
      <div class="row gap-5">
        <div class="col-lg col-sm-12 border rounded-4 p-4 d-flex justify-content-between flex-column text-white" style="background-color: #9747FF ; ">
          <div class="">
            <h3 class="text-yellow">1</h3>
            <h2 class="">Buat Akun Anda</h2>
          </div>
          <p class="">Yang Anda perlukan hanya alamat email untuk membuat akun dan mulai memasang lowongan Anda.</p>
        </div>
        <div class="col-lg col-sm-12 border rounded-4 p-4 d-flex justify-content-between flex-column text-white" style="background-color: #9747FF ; ">
          <div class="mb-3">
            <h3 class="text-yellow">2</h3>
            <h2 class="">Pasang Lowongan Anda</h2>
          </div>
          <p class="">Kemudian tinggal tambahkan judul, deskripsi, dan lokasi ke pemasangan lowongan Anda, dan lowongan Anda sudah siap.</p>
        </div>
        <div class="col-lg col-sm-12 border rounded-4 p-4 d-flex justify-content-between flex-column text-white" style="background-color: #9747FF ; ">
          <div class="">
            <h3 class="text-yellow">3</h3>
            <h2 class="">Buat Akun Anda</h2>
          </div>
          <p class="">Setelah Anda memasang lowongan, gunakan alat kami yang canggih untuk membantu Anda menemukan talenta idaman.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- end step by step -->
  <!-- hemat waktu -->
  <div class="vh-100 d-flex justify-content-center align-items-center mt" style="margin-top: 2rem;">
    <div class="container-fluid py-5" style="background-color: #EEE1FF;">
      <div class="conatiner">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5 col-md-12 d-flex flex-column text-center-mb">
            <h2 class="mx-sm-auto mx-lg-0" style="color: #36007B;">Hemat waktu dan tenaga dalam <br>
              upaya perekrutan anda</h2>
            <p class="mb-3 px-lg-0 px-sm-5 pt-sm-2">Banyak kasus <b>penipuan</b> lowongan kerja di luar Lokermania. <br> Waspadalah terhadap perusahaan yang mewajibkan Anda untuk membayar dalam proses rekrutmen.</p>
          </div>
          <div class="col-lg-5 col-md-12 d-flex justify-content-center">
            <img src="../assets/vector/vektor-post-job2.png" alt="" class="w-100">
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection

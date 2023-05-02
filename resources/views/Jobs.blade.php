@extends('layouts.app')

@section('content')
    <div class="container-fluid imgHeroIndex" style="padding-top: 144px; background-color: #8863F5;">
        <div class="container backdropHero h-100 pb-5 animationUp">
            <div class="row d-flex align-items-center">
                <div class="col text-md-start text-center text-white backgroundHero">
                    <h1 class="fw-bold">Temukan <span style="color: #FFCE42;">Pekerjaan</span> Yang <span
                            style="color: #FFCE42;">Cocok</span> Dengan Keinginanmu</h1>
                    <p class="my-3">Dengan lokermania kamu bisa menemukan pekerjaan yang sesuai dengan keinginanmu</p>
                    <a href=" {{route('jobs_search')}} " class="btn text-white rounded-pill px-4 mt-5 py-md-3 fw-bold"
                        style="background-color: #FFC622;">Mulai sekarang</a>
                </div>
                <div class="col d-none d-md-block">
                    <img src="/assets/vector/vektor-jobs.png" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <div class="container-fluid" style="padding-top: 144px; padding-bottom: 128px;" data-aos="fade-up"
        data-aos-duration="1500">
        <div class="container">
            <div class="position-relative">
                <h2 class="fw-bold mb-5">Temukan Lowongan Terbaru</h2>
                <img src="/assets/vector/vektor-lowongan-terbaru.png" alt="" class="position-absolute"
                    style="bottom: -80px; left: -40px; z-index: -10;">
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
    <!-- end lowongan terbaru -->

    <!-- pertanyaan -->
    <div class="container-fluid" style="padding-top: 144px; padding-bottom: 128px;" data-aos="fade-up"
        data-aos-duration="1500">
        <div class="container">
            <p class="mb-0 fw-bold" style="color: #9747FF;">FREQUENTLY ASKED QUESTION</p>
            <h2 class="mb-5">🤔• Pertanyaan yang Sering Diajukan</h2>
            <div class="accordion accordion-flush border" id="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Kenapa ya aku selalu ditolak banh? 😁
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, itaque necessitatibus libero
                            laudantium cum veniam nulla nobis vero tenetur nam!
                        </div>
                    </div>
                </div>

                <!-- active -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Apakah rehan wangsaff adalah CEO dari LokerMania? 😅😅😅
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nisi harum iure suscipit eum non
                            molestias maiores doloremque consequatur quae?
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Afa iyah lulusan It bisa benerin Ac? 👆🏻😅
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem fugiat praesentium officia quasi
                            totam doloribus. Quaerat alias itaque rerum quo.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apa rekomendasi kerja buat orang yang jomblo? 😥
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti unde provident molestiae eum
                            ipsa inventore deleniti nam iste laboriosam delectus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end pertanyaan -->

    <!-- Masih bingung? -->
    <div class="container-fluid bgCardSmall py-4" style="margin-top: 80px; margin-bottom: 128px;">
        <div class="container text-white bgCardLarge rounded-5 overflow-hidden">
            <div class="row align-items-center">
                <div class="col ps-md-5">
                    <h2 class="fs-5 fw-bold">Masih bingung cari kerja yang cocok? 🤔</h2>
                    <p class="w-75 mt-3 mb-5">Tenang, kami mempunyai fitur rekomendasi yang membantu kamu mencari kerja
                        yang tepat dengan menjawab pertanyaan yang kami berikan.</p>
                    <a href="src/pages/search-job.html" class="text-white nav-link">Mulai sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </a>
                </div>
                <div class="col d-none d-md-flex justify-content-end">
                    <img src="/assets/vector/vektor3.png" alt="" class="">
                </div>
            </div>
        </div>
    </div>
@endsection

  @extends('layouts.app')

@section('content')
    <!--HEADER-->
    <div class="container-fluid border-bottom w-100 position-relative" style="height: 657px; max-height: 100vh;">
        <img src="../assets/vector/vektor-post-job3.png" alt="" class="w-100 position-absolute start-0 bottom-0">
        <div class="container h-100 d-flex justify-content-start align-items-center w-100">
            <div class="row gap-3 w-100">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-center rounded-circle">
                        <div class="rounded-circle overflow-hidden" style="width: 100px">
                            @if ($user->image == null)
                                <img class="card-title" src=" {{ url('storage/user-icon.png') }} " alt=""
                                    width="100px">
                            @else
                                <img class="card-title" src=" {{ url('storage/' . $user->image) }} " alt=""
                                    width="100px">
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3 gap-3 d-flex justify-content-center">
                        <div class="col-lg col-sm-4 p-0"> 
                            <button class="btn rounded-pill btn-primary py-2 px-3 w-100" data-bs-toggle="modal"
                                data-bs-target="#modalProfileCompany">
                                <small>Edit Profile</small>
                            </button>
                        </div>
                        <div class="col-lg col-sm-4 p-0">
                            <button type="submit" class="btn rounded-pill btn-danger py-2 px-3 w-100"
                                data-bs-toggle="modal" data-bs-target="#modaldeleteprofile">
                                <small>Hapus Profile</small>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center-mb">
                    <h2> {{ $user->name }} </h2>
                    <div class="d-flex flex-column align-items-center-mb gap-2 mt-4">
                        <div class="d-flex gap-2">
                            <img src="../assets/vector/solid-location.png" height="25" alt="" />
                            {{ $user->address }}
                        </div>
                        <div class="d-flex gap-2">
                            <img src="../assets/vector/call.png" alt="" />{{ $user->phone }}
                        </div>
                        <div class="d-flex gap-2">
                            <img src="../assets/vector/mail.png" alt="" />{{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal delete profile --}}
    <div class="modal fade" id="modaldeleteprofile" aria-hidden="true" aria-labelledby="modaldelete" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center flex-column gap-2">
                    <img class="w-25" src="../assets/vector/salah.png" alt="">
                    <h5>Hapus Profile</h5>
                    <p>Perhatian! Apakah Anda yakin ingin menghapus profile anda ? Tindakan ini tidak dapat
                        dibatalkan dan data akan dihapus secara permanen</p>
                    <form action=" {{ route('delete_profile') }} " method="post">
                        @csrf
                        <button class="btn rounded-pill btn-danger py-2 px-3 w-100">
                            <small>Hapus Profile</small>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End modal delete profile --}}

    <!-- bottom profile company -->
    <div class="container-fluid vh-100">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row gap-5">
                <div class="col-lg col-sm-12 border py-4 px-5 rounded-4">
                    <h2>Daftar Lowongan</h2>
                    <hr>
                    @foreach ($jobs as $job)
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="p-0"> {{ $job->title }} </p>
                            <div class="">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalJob{{ $job->id }}">
                                    Edit
                                </button>
                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete{{ $job->id }}">Hapus</button>
                            </div>
                        </div>
                    @endforeach
                    {{-- Modal Delete Jobs --}}
                    @foreach ($jobs as $job)
                        <div class="modal fade" id="modaldelete{{ $job->id }}" aria-hidden="true"
                            aria-labelledby="modaldelete" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                                <div class="modal-content">
                                    <div class="modal-header" style="border: none;">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div
                                        class="modal-body d-flex justify-content-center align-items-center flex-column gap-2">
                                        <img class="w-25" src="../assets/vector/salah.png" alt="">
                                        <h5>Hapus Pekerjaan</h5>
                                        <p>Perhatian! Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat
                                            dibatalkan dan data akan dihapus secara permanen</p>
                                        <form action="{{ route('delete_job', $job) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg col-sm-12 border py-4 px-5 rounded-4">
                    <h2>Deskripsi Perusahaan</h2>
                    <hr>
                    <p>{{ $user->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- modal profile -->
    <div class="modal fade" id="modalProfileCompany" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 1126px;">
            <div class="modal-content">
                <div class="modal-body">
                    @php
                        $error = 0;
                    @endphp
                    <form action=" {{ route('store_profile') }} " method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nameCompnay">Nama Perusahaan</label><br>
                                <input class="border w-100 rounded px-3 py-2 mt-1" name="name" type="text"
                                    id="nameCompnay" value=" {{ $user->name }} ">
                            </div>
                            <div class="col">
                                <label for="phonenumber">Nomor Telepon</label><br>
                                <input class="border w-100 rounded px-3 py-2 mt-1" name="phone" type="text"
                                    id="phonenumber" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="address">Alamat</label><br>
                                <input class="border w-100 rounded px-3 py-2 mt-1" type="text" name="address"
                                    id="address" value="{{ $user->address }}">
                            </div>
                            <div class="col">
                                <label for="email">Email</label><br>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="descCompany">Deskripsi Perusahaan</label>
                                <textarea name="description" id="description" cols="30" rows="10" style="resize: unset;"
                                    class="form-control"> {{ $user->description }} </textarea>
                            </div>
                            <div class="col-6">
                                <div class="row gap-1">
                                    <div class="col-12">
                                        <label for="password">Password</label><br>
                                        <input class="border w-100 rounded px-3 py-2 mt-1" name="password"
                                            type="password" id="password" required>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="password">Konfirmasi Password</label><br>
                                        <input class="border w-100 rounded px-3 py-2 mt-1" name="password_confirmation"
                                            type="password" id="password" required>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="fotoProfile">Ganti foto profile</label><br>
                                        <input class="border w-100 rounded px-3 py-2 mt-1" name="image" type="file"
                                            id="fotoProfile" value="{{ $user->image }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-start" style="border: none;">
                            <button type="submit" name="submit" class="btn btn-primary rounded-pill"
                                data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Simpan Perubahan</button>
                            <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- modal jobs -->
    @php
        $data ;
        $requirements ;
    @endphp
    @foreach ($jobs as $job)
        <div class="modal fade" id="modalJob{{ $job->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 1126px;">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action=" {{ route('update_job', $job) }} " method="POST" class="px-5 py-4">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="nameJob ">Nama Pekerjaan</label>
                                    <input type="text" name="title" class="border w-100 rounded px-3 py-2 mt-1"
                                        id="nameJob" value=" {{ $job->title }} ">
                                </div>
                                <div class="col">
                                    <label for="salary">Gaji</label>
                                    <input type="text" name="salary" value=" {{ $job->salary }} "
                                        class="border w-100 rounded px-3 py-2 mt-1" id="salary"
                                        placeholder="Last name">
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
                                    <input type="text" name="graduates" value=" {{ $job->graduates }} "
                                        class="border w-100 rounded px-3 py-2 mt-1" id="graduate"
                                        placeholder="Teknik informatika, teknik bangunan, dll">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-12">
                                            @php
                                                $data = $job->requirements ;
                                                $requirements = explode(',', $data);
                                                foreach($requirements as $requirement) :
                                            @endphp
                                            <input type="text" name="requirements" value=" {{ ($requirement) }} "
                                            class="border w-100 rounded px-3 py-2 mt-1" placeholder="qualification">
                                            @php
                                                endforeach ;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="major">Jurusan</label>
                                            <input type="text" name="major" value=" {{ $job->major }} "
                                                class="border w-100 rounded px-3 py-2 mt-1" id="major"
                                                placeholder="Last name">
                                        </div>
                                        <div class="col-12">
                                            <label for="experience">Pengalaman</label>
                                            <input type="text" name="experiences" value="  {{ $job->experiences }}"
                                                class="border w-100 rounded px-3 py-2 mt-1" id="experience"
                                                placeholder="1 year">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" cols="30" rows="10" style="resize: unset;"
                                        class="form-control">{{ $job->description }}</textarea>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start" style="border: none;">
                        <button type="submit" name="submit" class="btn btn-primary rounded-pill"
                            data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Simpan Perubahan</button>
                        <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Succes edit profile --}}
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center flex-column gap-2">
                    <img class="w-25" src="../assets/vector/centang.png" alt="">
                    <h4>Perubahan Berhasil di Simpan</h4>
                </div>
            </div>
        </div>
    </div>
@endsection

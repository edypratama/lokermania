@extends('layouts.app')

@section('content')
    <!-- content -->
    <div class="container-fluid vh-100 w-100" style="margin-top: 7em;">
        <div class="container w-100 mt-5">
            <div class="border rounded h-100">
                @php
                    $i = 0;
                @endphp
                <table class="table table-striped table-hover">
                    <thead class="fs-6" style="height: 50px;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Lowongan yang dilamar</th>
                            <th scope="col">CV</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($applied_jobs as $applied_job)
                        @php
                            $date1 = $applied_job->created_at;
                            $date_array = explode(' ', $date1);
                            $date = $date_array[0];
                        @endphp
                        <tbody class="table-group-divider">
                            <tr>
                                @php
                                    $i++;
                                @endphp
                                <th scope="row"> {{ $i }} </th>
                                <td>
                                    <a class="text-black text-decoration-none a-modals" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $applied_job->id }}" style="cursor: pointer;">
                                        {{ $applied_job->applicant->name }}
                                    </a>
                                </td>
                                <td> {{ $applied_job->job->title }} </td>
                                <td> <a href="{{ url('storage/' . $applied_job->applicant->cv) }}"
                                        class="btn btn-primary">Show CV</a> </td>
                                <td> {{ $date }} </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modaldelete{{ $applied_job->id }}">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- end content -->

    {{-- Modal Delete Applicants --}}
    @foreach ($applied_jobs as $applied_job)     
    <div class="modal fade" id="modaldelete{{ $applied_job->id }}" aria-hidden="true" aria-labelledby="modaldelete"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center flex-column gap-3">
                    <h5 c; >Hapus Pelamar</h5>
                    <img class="w-25" src="../assets/vector/salah.png" alt="">
                    <p>Perhatian! Apakah Anda yakin ingin menghapus pelamar ini? Tindakan ini tidak dapat
                        dibatalkan dan data akan dihapus secara permanen</p>
                    <form action="{{ route('delete_applicant', $applied_job) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End modal delete aplicant --}}

    <!-- Modal -->
    @foreach ($applied_jobs as $item)
        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-dialog modal-dialog-centered" style="max-width: 1126px;">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="" autocomplete="off">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name">Nama lengkap</label><br>
                                    <input class="border w-100 rounded px-3 py-2 mt-1" type="text" id="name"
                                        value="{{ $item->applicant->name }}">
                                </div>
                                <div class="col">
                                    <label for="age">Umur</label><br>
                                    <input class="border w-100 rounded px-3 py-2 mt-1" type="number" id="age"
                                        value="{{ $item->applicant->age }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email">Email</label><br>
                                    <input class="border w-100 rounded px-3 py-2 mt-1" type="email" id="email"
                                        value="{{ $item->applicant->email }}">
                                </div>
                                <div class="col">
                                    <label for="jenkel">Jenis kelamin</label><br>
                                    <input class="border w-100 rounded px-3 py-2 mt-1" type="text" id="jenkel"
                                        value="{{ $item->applicant->gender }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="address">Alamat</label><br>
                                    <input class="border w-100 rounded px-3 py-2 mt-1" type="text" id="address"
                                        value="{{ $item->applicant->address }}">
                                </div>
                                <div class="col">
                                    <label for="phonenumber">CV</label><br>
                                    <input type="text"><a href="{{ url('storage/' . $applied_job->applicant->cv) }}"
                                        class="btn btn-primary">Show CV</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="phonenumber">Phone number</label><br>
                                <input class="border w-100 rounded px-3 py-2 mt-1" type="text" id="phonenumber"
                                    value="{{ $item->applicant->phone }}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-start" style="border: none;">
                        <form action=" {{ route( 'SendEmail', $item->applicant->id)  }} " method="get">
                            <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                            data-bs-toggle="modal">Kirim Email</button>
                        </form>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Hapus
                            Pelamar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

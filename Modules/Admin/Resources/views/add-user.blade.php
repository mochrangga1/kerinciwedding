@extends('layout.master')

@section('container')

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Admin Baru</h3>

            <div class="d-flex align-items-center">



            </div>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="card">

            <div class="card-header">

                <h4>Tambah Admin Baru</h4>

            </div>

            <div class="card-body">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class=" icon-user-follow">Tambah Admin</i></button>

            </div>

        </div>

        <div class="card">

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-12 col-md-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Daftar Admin</h4>

                                <table  id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable">

                                    <thead>

                                        <tr>

                                            <td>Nama Admin</td>

                                            <td>Username</td>

                                            <td>Status</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($user as $usr)

                                        <tr>

                                            <td>{{$usr->name}}</td>

                                            <td>{{$usr->username}}</td>

                                            <td>

                                                @if ($usr->status == "Aktif")

                                                    <span class="badge text-bg-warning">Aktif</span>

                                                @else

                                                    <span class="badge text-bg-danger">Tidak Aktif</span>

                                                @endif

                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                                <ul class="list-inline text-center mt-5 mb-2">

                                    <li class="list-inline-item text-muted fst-italic">Daftar User</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Admin</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form action="/admin/user" method="POST">

                        @csrf

                        <div class="col-lg-12">

                            <label for="nama">Nama</label>

                            <input type="text" class="form-control col-lg-6 @error('name')is-invalid @enderror" id="nama" name="name" required value="{{ old('name')}}">

                            @error('name')

                            <div class="invalid-feedback">

                                {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="col-lg-12">

                            <label for="username">Username</label>

                            <input type="text" class="form-control col-lg-6 @error('username')is-invalid @enderror" id="username" name="username" required value="{{ old('username')}}">

                            @error('username')

                            <div class="invalid-feedback">

                                {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="col-lg-12">

                            <label for="password">Password</label>

                            <input type="password" class="form-control col-lg-6 @error('password')is-invalid @enderror" id="password" name="password" required>

                            @error('password')

                            <div class="invalid-feedback">

                                {{ $message }}

                                </div>

                            @enderror

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>

                    </form>

                </div>

            </div>

        </div>

        </div>





@endsection

@extends('layout.master')

@section('container')

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Client Baru</h3>

            <div class="d-flex align-items-center">



            </div>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="card">

            <div class="card-header">

                <h4>Tambah Client Baru</h4>

            </div>

            <div class="card-body">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class=" icon-user-follow">Tambah Client</i></button>

            </div>

        </div>

        <div class="card">

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-12 col-md-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Daftar Client</h4>

                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable">

                                    <thead>

                                        <tr>

                                            <td>Nama Client</td>

                                            <td>No hp</td>

                                            <td>Username</td>

                                            <td>Alamat</td>

                                            <td>URL</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($client as $c)

                                        <tr>

                                            <td>{{$c->nama_client}}</td>

                                            <td>{{$c->no_hp}}</td>
                                            <td>{{$c->username}}</td>
                                            <td>{{$c->alamat}}</td>

                                            <td>

                                                <button class="btn btn-success" id="copyButton" data-clipboard-text="{{ env('APP_URL') }}/dash/client/{{$c->kode}}"><i class="icon-docs"></i></button>

                                                <button class="btn btn-primary editButton" value="{{$c->id_client}}"><i class=" fas fa-pencil-alt"></i></button>

                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                                <ul class="list-inline text-center mt-5 mb-2">

                                    <li class="list-inline-item text-muted fst-italic">Daftar Client</li>

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

                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah client</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form action="/add-client" method="POST">

                    @csrf

                    <div class="col-lg-12">

                        <label for="nama_client">Nama</label>

                        <input type="text" class="form-control col-lg-6 @error('nama_client')is-invalid @enderror" id="nama" name="nama_client" required value="{{ old('name')}}">

                        @error('nama_client')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="col-lg-12">

                        <label for="no_hp">No hp</label>

                        <input type="number" class="form-control col-lg-6 @error('no_hp')is-invalid @enderror" id="username" name="no_hp" required value="{{ old('username')}}">

                        @error('no_hp')

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

                    <div class="col-lg-12">

                        <label for="alamat">Alamat</label>

                        <input type="text" class="form-control col-lg-6 @error('alamat')is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('username')}}">

                        @error('alamat')

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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit client</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <form action="/update-client" method="POST">

                    @csrf

                    <div class="col-lg-12">

                        <input type="hidden" id="id_client" name="id_client">

                        <label for="nama_client">Nama</label>

                        <input type="text" class="form-control col-lg-6 @error('nama_client')is-invalid @enderror" id="edit_nama" name="nama_client" required value="{{ old('name')}}">

                        @error('nama_client')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="col-lg-12">

                        <label for="no_hp">No hp</label>

                        <input type="number" class="form-control col-lg-6 @error('no_hp')is-invalid @enderror" id="edit_phone" name="no_hp" required value="{{ old('username')}}">

                        @error('no_hp')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <div class="col-lg-12">

                        <label for="username">Username</label>

                        <input type="text" class="form-control col-lg-6 @error('username')is-invalid @enderror" id="edit_username" name="username" required value="{{ old('username')}}">

                        @error('username')

                        <div class="invalid-feedback">

                            {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <div class="col-lg-12">

                        <label for="password">Password</label>

                        <input type="password" class="form-control col-lg-6 @error('password')is-invalid @enderror" id="edit_password" name="password" required>

                        @error('password')

                        <div class="invalid-feedback">

                            {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <div class="col-lg-12">

                        <label for="alamat">Alamat</label>

                        <input type="text" class="form-control col-lg-6 @error('alamat')is-invalid @enderror" id="edit_alamat" name="alamat" required value="{{ old('username')}}">

                        @error('alamat')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>



                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>

            </div>

        </div>

    </div>

</div>





@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
    var clipboard = new ClipboardJS('#copyButton');

    clipboard.on('success', function(e) {

        alert('Teks telah disalin: ' + e.text);

    });

    clipboard.on('error', function(e) {

        console.error('Gagal menyalin teks: ', e.action);

    });
</script>

<script>
    $(document).ready(function() {



        $('.editButton').click(function() {

            var id = $(this).val();



            $.ajax({

                type: 'GET',

                url: '/get-data-client/' + id,

                success: function(response) {

                    $('#id_client').val(response.id_client);
                    $('#edit_nama').val(response.nama_client);
                    $('#edit_phone').val(response.no_hp);
                    $('#edit_username').val(response.username);
                    $('#edit_password').val(response.password);
                    $('#edit_alamat').val(response.alamat);


                    $('#editModal').modal('show');

                    console.log(response);

                },

                error: function(error) {

                    console.error(error);

                    alert('Terjadi kesalahan saat mengambil data.');

                }

            });

        });

    });
</script>

@endsection

@extends('layout.master')



@section('container')

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Undangan</h3>

            <div class="d-flex align-items-center"></div>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    <form action="/update-undangan/{{$undangan->id_undangan}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            <div class="col-lg-10">

                                <label for="nama_pria">Nama Client</label>

                                <input type="text" class="form-control col-lg-6" id="nama_pria" name="nama_pria" value="{{$client}}" readonly>

                            </div>

                        </div>

                        <!-- ... (bagian form yang lain) ... -->



                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

                            <h4>Nama Mempelai</h5>

                                <div class="row" >

                                    <div class="col-lg-6">

                                        <label for="nama_pria">Mempelai Pria</label>

                                        <input type="text" class="form-control col-lg-6" id="nama_pria" name="nama_pria" value="{{$undangan->nama_mempelai_pria}}" required>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Mempelai Wanita</label>

                                        <input type="text" class="form-control col-lg-6" id="nama_wanita" name="nama_wanita" value="{{$undangan->nama_mempelai_wanita}}" required>

                                    </div>

                                </div>

                        </div>

                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px">

                            <h4>Nama Orang Tua</h5>

                                <div class="row" >

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ayah Mempelai Laki-laki</label>

                                        <input type="text" class="form-control col-lg-6" id="ayah_pria" name="ayah_pria" value="{{$undangan->nama_ayah_pria}}" required>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ibu Mempelai Laki-laki</label>

                                        <input type="text" class="form-control col-lg-6" id="ibu_pria" name="ibu_pria" value="{{$undangan->nama_ibu_pria}}" required>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ayah Mempelai Perempuan</label>

                                        <input type="text" class="form-control col-lg-6" id="ayah_wanita" name="ayah_wanita" value="{{$undangan->nama_ayah_wanita}}" required>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ibu Mempelai Perempuan</label>

                                        <input type="text" class="form-control col-lg-6" id="ibu_wanita" name="ibu_wanita" value="{{$undangan->nama_ibu_wanita}}" required>

                                    </div>

                                </div>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Lokasi Acara</label>

                            <textarea class="form-control" name="lokasi" id="lokasi" required>{{$undangan->lokasi_acara}}</textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Alamat Pria</label>

                            <textarea class="form-control" name="alamat_pria" id="APria" required>{{$undangan->alamat_pria}}</textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Alamat Wanita</label>

                            <textarea class="form-control" name="alamat_wanita" id="AWanita" required>{{$undangan->alamat_wanita}}</textarea>

                        </div>

                        <div class="col-lg-12">

                            <label for="nama_client">URL Maps Acara</label>

                            <input type="text" class="form-control col-lg-6" id="maps" name="maps" placeholder="https://maps.google.com/..." value="{{$undangan->maps}}" required>

                            {{-- <input type="text" id="lokasi" name="lokasi" placeholder="Ketikkan nama lokasi" required>

                            <input type="hidden" id="latitude" name="latitude">

                            <input type="hidden" id="longitude" name="longitude"> --}}

                        </div>

                        <div class="col-lg-12">

                            <label for="nama_client">Tanggal Akad</label>

                            <input type="datetime-local" class="form-control col-lg-6" id="tanggal_akad" name="tanggal_akad" value="{{$undangan->tgl_waktu_akad}}" required>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Quote</label>

                            <textarea class="form-control" name="qoutes" id="quote" required>{{$undangan->quotes}}</textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Tema</label>

                            <select class="form-control" name="tema" required>
                                <option value="1">Tema 1</option>
                                <option value="2">Tema 2</option>
                                <option value="3">Tema 3</option>
                            </select>

                        </div>

                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

                            <h4>Foto Foto</h5>

                                <div class="col-lg-6 mt-2">

                                    <label for="foto_cover">Foto Cover</label>

                                    <input type="file" class="form-control" id="foto_cover" name="foto_cover" accept="image/*" required>

                                </div>

                                <div class="col-lg-6 mt-2">

                                    <label for="foto_pria">Foto Mempelai Pria</label>

                                    <input type="file" class="form-control" id="foto_pria" name="foto_pria" accept="image/*" required>

                                </div>

                                <div class="col-lg-6 mt-2">

                                    <label for="foto_wanita">Foto Mempelai Wanita</label>

                                    <input type="file" class="form-control" id="foto_wanita" name="foto_wanita" accept="image/*" required>

                                </div>

                                <div class="col-lg-6 mt-2">

                                    <label for="foto_prewed">Foto Prewedding</label>

                                    <input type="file" class="form-control" id="foto_prewed" name="foto_prewed" accept="image/*" required>

                                </div>

                        </div>

                        <h4>Waktu acara resepsi tiap sesi</h4>

                        <div id="input-container">

                            <!-- Input awal -->

                            <div class="input-row">

                                @foreach ($sesi as $ss => $item)

                                <div class="row">

                                        <div class="col-lg-10">

                                            <input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_1" value="{{$item}}" required>

                                        </div>

                                        <div class="col-lg-2">

                                            <button class="btn btn-danger btn-remove"><i class="far fa-trash-alt"></i></button>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                        <button type="button" class="btn btn-primary btn-add mt-2"><i class="fas fa-plus-circle"></i></button> <br>

                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection



@section('script')

<script src="{{asset('FreeDash-lite-master/src')}}/dist/js/maps.js"></script>

<script>

    $(document).ready(function() {

        // Tombol Tambah

        $('.btn-add').on('click', function() {

            var inputCount = $('#input-container .input-row').length + 1;



            var newRow = $('<div class="input-row">' +

                '<div class="row">' +

                '<div class="col-lg-10">' +

                '<input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_' + inputCount + '">' +

                '</div>' +

                '<div class="col-lg-2">' +

                '<button class="btn btn-danger btn-remove"><i class="far fa-trash-alt"></i></button>' +

                '</div>' +

                '</div>' +

                '</div>');



            $('#input-container').append(newRow);

        });



        // Tombol Kurangi

        $('#input-container').on('click', '.btn-remove', function() {

            var row = $(this).closest('.input-row');

            row.remove();



            // Mengatur tombol Kurangi pada baris sebelumnya

            if ($('#input-container .input-row').length === 1) {

                $('#input-container .input-row .btn-remove').prop('disabled', true);

            }

        });

    });

</script>

@endsection


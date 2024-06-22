@extends('layout.master')

@section('container')

<div class="page-breadcrumb">

    <div class="row">

        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Undangan Baru</h3>

            <div class="d-flex align-items-center">



            </div>

        </div>

    </div>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="card">

            <div class="card-body">

                <div class="row">

                    <form action="/add-undangan" method="POST">

                        @csrf

                            <div class="col-lg-2">

                                <h4>Nama Client</h4>

                            </div>

                            <div class="col-lg-10">

                                <select class="form-control" name="id_client">

                                    <option value="">-- Pilih Client --</option>

                                    @foreach ($client as $cl)

                                    <option value="{{ $cl->id_client }}">{{ $cl->nama_client }}</option>

                                    @endforeach

                                <select>

                            </div>

                        </div>

                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

                            <h4>Nama Mempelai</h5>

                                <div class="row" >

                                    <div class="col-lg-6">

                                        <label for="nama_pria">Mempelai Pria</label>

                                        <input type="text" class="form-control col-lg-6" id="nama_pria" name="nama_pria">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Mempelai Wanita</label>

                                        <input type="text" class="form-control col-lg-6" id="nama_wanita" name="nama_wanita">

                                    </div>

                                </div>

                        </div>

                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px">

                            <h4>Nama Orang Tua</h5>

                                <div class="row" >

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ayah Mempelai Laki-laki</label>

                                        <input type="text" class="form-control col-lg-6" id="ayah_pria" name="ayah_pria">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ibu Mempelai Laki-laki</label>

                                        <input type="text" class="form-control col-lg-6" id="ibu_pria" name="ibu_pria">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ayah Mempelai Perempuan</label>

                                        <input type="text" class="form-control col-lg-6" id="ayah_wanita" name="ayah_wanita">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Ibu Mempelai Perempuan</label>

                                        <input type="text" class="form-control col-lg-6" id="ibu_wanita" name="ibu_wanita">

                                    </div>

                                </div>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Lokasi Acara</label>

                            <textarea class="form-control" name="lokasi" id="lokasi"></textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Alamat Pria</label>

                            <textarea class="form-control" name="alamat_pria" id="APria"></textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Alamat Wanita</label>

                            <textarea class="form-control" name="alamat_wanita" id="AWanita"></textarea>

                        </div>

                        <div class="col-lg-12">

                            <label for="nama_client">URL Maps Acara</label>

                            <!-- <input type="text" class="form-control col-lg-6" id="maps" name="maps" placeholder="https://maps.google.com/..."> -->

                            <input type="text" id="lokasi" name="lokasi" placeholder="Ketikkan nama lokasi" required>



                            <div id="map" style="height: 300px;"></div>



                            <input type="hidden" id="latitude" name="latitude">

                            <input type="hidden" id="longitude" name="longitude">

                        </div>

                        <div class="col-lg-12">

                            <label for="nama_client">Tanggal Akad</label>

                            <input type="datetime-local" class="form-control col-lg-6" id="tanggal_akad" name="tanggal_akad">

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Quote</label>

                            <textarea class="form-control" name="qoutes" id="quote"></textarea>

                        </div>

                        <div class="mb-3">

                            <label for="lokasi">Tema</label>

                            <select class="form-control" name="tema">

                                <option value="1" checked>Tema 1</option>

                                <option value="2">Tema 2</option>

                                <option value="3">Tema 3</option>
                                <option value="4">Tema 3</option>

                            </select>

                        </div>

                        <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

                            <h4>Foto Mempelai</h5>

                                <div class="row" >

                                    <div class="col-lg-6">

                                        <label for="gambar_pria">Foto Mempelai Pria</label>

                                        <input type="file" class="form-control" id="gamabr_pria" name="gambar_pria">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="gambar_wanita"> FotoMempelai wanita</label>

                                        <input type="file" class="form-control" id="gamabr_wanita" name="gambar_wanita">

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="nama_client">Mempelai Wanita</label>

                                        <input type="text" class="form-control col-lg-6" id="nama_wanita" name="nama_wanita">

                                    </div>

                                </div>

                        </div>

                        {{-- <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px">

                            <h4>Waktu acara resepsi tiap sesi</h5>

                                <div class="row" >

                                    @for ($i = 0; $i < 3; $i++)

                                    <div class="col-lg-12">

                                        <input type="datetime-local" class="form-control col-lg-6" id="resepsi" name="sesi[{{ $i }}][waktu]">

                                    </div>

                                    @endfor

                                </div>

                        </div> --}}

                            <h4>Waktu acara resepsi tiap sesi</h5>

                                <div id="input-container">

                                    <!-- Input awal -->

                                    <div id="input-container">

                                        <!-- Input awal -->

                                        <div class="input-row">

                                            <div class="row">

                                                <div class="col-lg-10">

                                                    <input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_1">

                                                </div>

                                                <div class="col-lg-2">

                                                    <button class="btn btn-danger btn-remove" disabled><i class="far fa-trash-alt"></i></button>

                                                </div>

                                            </div>





                                        </div>

                                    </div>

                                </div>

                                <button type="button" class="btn btn-primary btn-add mt-2"><i class=" fas fa-plus-circle"></i></button>

                        </div>





                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button></form>

                <!-- Tombol Tambah dan Hapus di luar form -->





        {{-- <div class="row">

            <div class="col-lg-6">

                <button class="btn btn-primary" onclick="add()">Tambah</button>

            </div>

            <div class="col-lg-6">

                <button class="btn btn-danger" onclick="remove()">Kurangi</button>

            </div>

        </div> --}}

        </div>

    </div>

</div>



@endsection

@section('script')

<script>

        <script src="{{asset('FreeDash-lite-master/src')}}/assets/libs/chart.js/dist/maps.js"></script>

    $(document).ready(function() {

        // Tombol Tambah

        $('.btn-add').on('click', function() {

            // var newRow = $('#input-container .input-row:last').clone();

            // newRow.find('input').val('1');

            // newRow.find('.btn-remove').prop('disabled', false);

            // $('#input-container').append(newRow);

            // counter++;



            // var newRow = $('<div class="input-row">' +

            //     '<input type="text" name="input[]" id="input_' + counter + '">' +

            //     '<button type="button" class="btn-remove">Kurangi</button>' +

            //     '</div>');



            // $('#input-container').append(newRow);



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

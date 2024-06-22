@extends('layout.master')
@section('container')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">

            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Undangan Baru</h3>

            <div class="d-flex align-items-center"></div </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <form action="/add-undangan" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-lg-2">

                                    <h4>Nama Client</h4>

                                </div>

                                <div class="col-lg-10">

                                    <select class="form-control" name="id_client" required>

                                        <option value="">-- Pilih Client --</option>

                                        @foreach ($client as $cl)

                                        <option value="{{ $cl->id_client }}">{{ $cl->nama_client }}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <!-- ... (bagian form yang lain) ... -->



                            <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

                                <h4>Nama Mempelai</h5>

                                    <div class="row">

                                        <div class="col-lg-6">

                                            <label for="nama_pria">Mempelai Pria</label>

                                            <input type="text" class="form-control col-lg-6" id="nama_pria" name="nama_pria" required>

                                        </div>

                                        <div class="col-lg-6">

                                            <label for="nama_client">Mempelai Wanita</label>

                                            <input type="text" class="form-control col-lg-6" id="nama_wanita" name="nama_wanita" required>

                                        </div>

                                    </div>

                            </div>

                            <div class="card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px">

                                <h4>Nama Orang Tua</h5>

                                    <div class="row">

                                        <div class="col-lg-6">

                                            <label for="nama_client">Ayah Mempelai Laki-laki</label>

                                            <input type="text" class="form-control col-lg-6" id="ayah_pria" name="ayah_pria" required>

                                        </div>

                                        <div class="col-lg-6">

                                            <label for="nama_client">Ibu Mempelai Laki-laki</label>

                                            <input type="text" class="form-control col-lg-6" id="ibu_pria" name="ibu_pria" required>

                                        </div>

                                        <div class="col-lg-6">

                                            <label for="nama_client">Ayah Mempelai Perempuan</label>

                                            <input type="text" class="form-control col-lg-6" id="ayah_wanita" name="ayah_wanita" required>

                                        </div>

                                        <div class="col-lg-6">

                                            <label for="nama_client">Ibu Mempelai Perempuan</label>

                                            <input type="text" class="form-control col-lg-6" id="ibu_wanita" name="ibu_wanita" required>

                                        </div>

                                    </div>

                            </div>

                            <div class="mb-3">

                                <label for="lokasi">Lokasi Acara</label>

                                <textarea class="form-control" name="lokasi" id="lokasi" required></textarea>

                            </div>

                            <div class="mb-3">

                                <label for="lokasi">Alamat Pria</label>

                                <textarea class="form-control" name="alamat_pria" id="APria" required></textarea>

                            </div>

                            <div class="mb-3">

                                <label for="lokasi">Alamat Wanita</label>

                                <textarea class="form-control" name="alamat_wanita" id="AWanita" required></textarea>

                            </div>

                            <div class="col-lg-12">

                                <label for="nama_client">URL Maps Acara</label>

                                <input type="text" class="form-control col-lg-6" id="maps" name="maps" placeholder="https://maps.google.com/..." required>

                                {{-- <input type="text" id="lokasi" name="lokasi" placeholder="Ketikkan nama lokasi" required>

                            <input type="hidden" id="latitude" name="latitude">

                            <input type="hidden" id="longitude" name="longitude"> --}}

                            </div>

                            <div class="col-lg-12">

                                <label for="nama_client">Tanggal Akad</label>

                                <input type="datetime-local" class="form-control col-lg-6" id="tanggal_akad" name="tanggal_akad" required>

                            </div>

                            <div class="mb-3">

                                <label for="lokasi">Quote</label>

                                <textarea class="form-control" name="qoutes" id="quote" required></textarea>

                            </div>

                            <div class="mb-3">
                            <label for="tema">Pilih Tema</label>
                                <div class="container">
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-5">
                                            <div class="card card-body">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tema" name="tema" value="1" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="male">Tema 1</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tema" name="tema" value="2" class="custom-control-input">
                                                    <label class="custom-control-label" for="female">Tema 2</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tema3" name="tema" value="3" class="custom-control-input">
                                                    <label class="custom-control-label" for="tema3">Tema 3</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="tema4" name="tema" value="4" class="custom-control-input">
                                                    <label class="custom-control-label" for="tema4">Tema 4</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-body" id="output">
                                                    <!-- Output -->
                                                </div>
                                                <div class="card-footer" id="text">
                                                    <!-- Text -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var _radio = document.querySelectorAll('input[type="radio"]');
                                var _output = document.getElementById('output');
                                var _text = document.getElementById('text');

                                for (var i = 0; i < _radio.length; i++) {
                                    _radio[i].onclick = function() {
                                        console.log(this.value)
                                        if (this.value === "1") {
                                            _output.innerHTML = `<img src="{{asset('images/undangan_1_cover.png')}}">`;
                                            _text.innerHTML = "TEMA <strong>1</strong>";
                                        }
                                        if (this.value === "2") {
                                            _output.innerHTML = `<img src="{{asset('images/undangan_1_prewedding.png')}}">`;
                                            _text.innerHTML = "TEMA<strong>2</strong>";
                                        }
                                    }
                                }
                            </script>

                    </div>
                    <div class=" card" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">

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

                            <div class="row">

                                <div class="col-lg-10">

                                    <input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_1" required>

                                </div>

                                <div class="col-lg-2">

                                    <button class="btn btn-danger btn-remove" disabled><i class="far fa-trash-alt"></i></button>

                                </div>

                            </div>

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

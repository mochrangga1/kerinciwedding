@extends('layout.master')

@section('container')

 <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-7 align-self-center">

                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"> Halaman Daftar Undangan </h3> {{-- {{ auth()->user()->name}} --}}

                        <div class="d-flex align-items-center">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb m-0 p-0">

                                    <li class="breadcrumb-item"><a href="#">Dashboard</a>

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- End Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- Container fluid  -->

            <!-- ============================================================== -->

            <div class="container-fluid">

                <!-- *************************************************************** -->

                <!-- Start First Cards -->

                <!-- *************************************************************** -->

                <div class="row">



                    <div class="col-lg-12 col-md-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title">Daftar Undangan</h4>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUndanganBaru"><i class=" icon-notebook"></i>
                                    Tambah Undangan Baru
                                </button>
                                </div>

                                <table  id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable">

                                    <thead>

                                        <tr>

                                            <td>Nama Client</td>

                                            <td>Lokasi</td>

                                            <td>Tema</td>

                                            <td>Aksi</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($undangan as $ud)

                                        <tr>

                                            <td>{{$ud->nama_client}}</td>

                                            <td>{{$ud->lokasi_acara}}</td>

                                            <td>{{$ud->tema}}</td>

                                            <td>

                                                <a href="/edit-undangan/{{$ud->id_undangan}}" class="btn btn-primary" data-id="{{ $ud->id_undangan }}" data-bs-toggle="modal" data-bs-target="#modalUndanganEdit"><i class="fas fa-pencil-alt"></i></a>

                                                @if ($ud->status_tamu == null)

                                                <button class="btn btn-danger delete-undangan" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="{{$ud->id_undangan}}"><i class="fas fa-trash-alt"></i></button>

                                                @endif

                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                                <ul class="list-inline text-center mt-5 mb-2">

                                    <li class="list-inline-item text-muted fst-italic">Daftar Undangan Tersimpan</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"

                    aria-labelledby="myModalLabel" aria-hidden="true">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel">Tambah Client</h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"

                                    aria-hidden="true"></button>

                            </div>

                            <div class="modal-body">

                                <form action="/add-client" method="POST">

                                    @csrf

                                <label for="nama_client">Nama Client</label>

                                <input type="text" class="form-control" id="nama_client" name="nama_client">

                                <label for="nama_client">No Telfon</label>

                                <input type="tel" class="form-control" id="tel_client" name="tel_client">

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-light"

                                    data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Simpan</button>

                            </form>

                            </div>

                        </div><!-- /.modal-content -->

                    </div><!-- /.modal-dialog -->

                </div><!-- /.modal -->



                {{-- MODAL HAPUS UNDANGAN --}}

                {{-- <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                Apakah Anda yakin ingin menghapus undangan ini?

                            </div>

                            <div class="modal-footer">

                                <input type="hidden" id="undanganIdToDelete" value="">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                                <button type="button" class="btn btn-danger" onclick="hapusUndangan()">Hapus</button>

                            </div>

                        </div>

                    </div>

                </div> --}}

                <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>

                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>

                        <div class="modal-body">

                            Apakah Anda yakin ingin menghapus undangan ini?

                        </div>

                        <div class="modal-footer">

                            <input type="hidden" id="undanganIdToDelete" value="">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                            <button type="button" class="btn btn-danger" onclick="hapusUndangan()">Hapus</button>

                        </div>

                      </div>

                    </div>

                  </div>

            </div>

            <!-- ============================================================== -->

            <!-- End Container fluid  -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- footer -->

            <!-- ============================================================== -->

            <footer class="footer text-center text-muted">

                All Rights Reserved by Freedash. Designed and Developed by <a

                    href="https://adminmart.com/">Adminmart</a>.

            </footer>

            <!-- ============================================================== -->

            <!-- End footer -->

            <!-- ============================================================== -->
                <!-- Modal Tambah Undangan -->
                <form action="/add-undangan" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="modalUndanganBaru" tabindex="-1" aria-labelledby="modalUndanganBaruLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalUndanganBaruLabel">Tambah Undangan Baru</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Client</label>
                                        <div class="select">
                                            <select class="select2 nama" name="id_client" style="width: 100%;">

                                                <option value="">-- Pilih Client --</option>

                                                @foreach ($client as $cl)

                                                <option value="{{ $cl->id_client }}">{{ $cl->nama_client }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 px-3">
                                        <div class="row" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Nama Mempelai</h4>
                                            <div class="col">
                                                <label for="nama_pria">Mempelai Pria</label>
                                                <input type="text" class="form-control" id="nama_pria" name="nama_pria" required>
                                            </div>
                                            <div class="col">
                                                <label for="nama_client">Mempelai Wanita</label>
                                                <input type="text" class="form-control" id="nama_wanita" name="nama_wanita" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 px-3">
                                        <div class="row" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Nama Orang Tua</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama_client">Ayah Mempelai Laki-laki</label>
                                                    <input type="text" class="form-control" id="ayah_pria" name="ayah_pria" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nama_client">Ibu Mempelai Laki-laki</label>
                                                    <input type="text" class="form-control" id="ibu_pria" name="ibu_pria" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama_client">Ayah Mempelai Perempuan</label>
                                                    <input type="text" class="form-control col-lg-6" id="ayah_wanita" name="ayah_wanita" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nama_client">Ibu Mempelai Perempuan</label>
                                                    <input type="text" class="form-control" id="ibu_wanita" name="ibu_wanita" required>
                                                </div>
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
                                    <div class="mb-3">
                                        <label for="nama_client">URL Maps Acara</label>

                                        <input type="text" class="form-control col-lg-6" id="maps" name="maps" placeholder="https://maps.google.com/..." required>
                                    </div>
                                    <div class="mb-3">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="card">
                                                            <div class="card-body" id="output">
                                                                <!-- Output -->
                                                                <img src="{{asset('Undangan-Tema-1/assets/images/Tema1.jpeg')}}" class="img-fluid" width="200" height="200">
                                                            </div>
                                                            <div class="card-footer" id="text">
                                                                <!-- Text -->
                                                                TEMA <strong>1</strong>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#modalUndanganBaru input[type="radio"]').click(function() {
                                                    var value = $(this).val();
                                                    if (value === "1") {
                                                        $('#output').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema1.jpeg')}}" class="img-fluid" width="200" height="200">`);
                                                        $('#text').html("TEMA <strong>1</strong>");
                                                    }
                                                    if (value === "2") {
                                                        $('#output').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema2.jpeg')}}" class="img-fluid" width="200" height="200">`);
                                                        $('#text').html("TEMA<strong>2</strong>");
                                                    }
                                                    if (value === "3") {
                                                        $('#output').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema3.jpg')}}" class="img-fluid" width="200" height="400">`);
                                                        $('#text').html("TEMA<strong>3</strong>");
                                                    }
                                                });
                                            });
                                        </script>
                                        <div class="mb-3" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Foto</h4>
                                            <div class="mb-3">
                                                <label for="foto_cover">Foto Cover</label>

                                                <input type="file" class="form-control" id="foto_cover" name="foto_cover" accept="image/*" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_pria">Foto Mempelai Pria</label>

                                                <input type="file" class="form-control" id="foto_pria" name="foto_pria" accept="image/*" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_wanita">Foto Mempelai Wanita</label>

                                                <input type="file" class="form-control" id="foto_wanita" name="foto_wanita" accept="image/*" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_prewed">Foto Prewedding</label>

                                                <input type="file" class="form-control" id="foto_prewed" name="foto_prewed" accept="image/*" required>
                                            </div>
                                        </div>

                                        <h4>Waktu acara resepsi tiap sesi</h4>
                                        <div class="mb-3">
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
                                            <div class="row">
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary btn-add mt-2 w-15"><i class="fas fa-plus-circle"></i></button> <br>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                {{-- Modal Edit Undangan --}}

                <form action="/update-undangan" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="modalUndanganEdit" tabindex="-1" aria-labelledby="modalUndanganEditLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalUndanganEditLabel">Tambah Undangan Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Client</label>
                                        <div class="select">
                                            <select class="select2 nama" name="id_client" style="width: 100%;">

                                                <option value="">-- Pilih Client --</option>

                                                @foreach ($client as $cl)

                                                <option value="{{ $cl->id_client }}">{{ $cl->nama_client }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 px-3">
                                        <div class="row" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Nama Mempelai</h4>
                                            <div class="col">
                                                <label for="nama_pria">Mempelai Pria</label>
                                                <input type="text" class="form-control" id="nama_pria" name="nama_pria" required>
                                            </div>
                                            <div class="col">
                                                <label for="nama_client">Mempelai Wanita</label>
                                                <input type="text" class="form-control" id="nama_wanita" name="nama_wanita" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 px-3">
                                        <div class="row" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Nama Orang Tua</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama_client">Ayah Mempelai Laki-laki</label>
                                                    <input type="text" class="form-control" id="ayah_pria" name="ayah_pria" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nama_client">Ibu Mempelai Laki-laki</label>
                                                    <input type="text" class="form-control" id="ibu_pria" name="ibu_pria" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nama_client">Ayah Mempelai Perempuan</label>
                                                    <input type="text" class="form-control col-lg-6" id="ayah_wanita" name="ayah_wanita" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nama_client">Ibu Mempelai Perempuan</label>
                                                    <input type="text" class="form-control" id="ibu_wanita" name="ibu_wanita" required>
                                                </div>
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
                                    <div class="mb-3">
                                        <label for="nama_client">URL Maps Acara</label>

                                        <input type="text" class="form-control col-lg-6" id="maps" name="maps" placeholder="https://maps.google.com/..." required>
                                    </div>
                                    <div class="mb-3">
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
                                                                <label class="custom-control-label" for="male">Hitam Clasic</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="tema" name="tema" value="2" class="custom-control-input">
                                                                <label class="custom-control-label" for="female">Putih Floral</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="tema3" name="tema" value="3" class="custom-control-input">
                                                                <label class="custom-control-label" for="tema3">Tema 3</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="card">
                                                            <div class="card-body" id="outputEdit">
                                                                <!-- Output -->
                                                            </div>
                                                            <div class="card-footer" id="textEdit">
                                                                <!-- Text -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#modalUndanganEdit input[name="tema"]').on('click', function() {
                                                    if (this.value === "1") {
                                                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema1.jpeg')}}" class="img-fluid" width="200" height="200">`);
                                                        $('#textEdit').html("TEMA <strong>1</strong>");
                                                    }
                                                    if (this.value === "2") {
                                                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema2.jpeg')}}" class="img-fluid" width="200" height="200">`);
                                                        $('#textEdit').html("TEMA<strong>2</strong>");
                                                    }
                                                    if (this.value === "3") {
                                                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema3.jpg')}}" class="img-fluid" width="200" height="200">`);
                                                        $('#textEdit').html("TEMA<strong>3</strong>");
                                                    }
                                                });
                                            });
                                        </script>
                                        <div class="mb-3" style="border:solid; border-color:rgb(125, 125, 125); border-radius:5px; padding:10px; margin-top: 10px">
                                            <h4>Foto</h4>
                                            <div class="mb-3">
                                                <label for="foto_cover">Foto Cover</label>
                                                <img src="" class="d-block img-fluid" width="200" height="200">
                                                <input type="file" class="form-control" id="foto_cover" name="foto_cover" accept="image/*">
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_pria">Foto Mempelai Pria</label>
                                                <img src="" class="d-block img-fluid" width="200" height="200">
                                                <input type="file" class="form-control" id="foto_pria" name="foto_pria" accept="image/*">
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_wanita">Foto Mempelai Wanita</label>
                                                <img src="" class="d-block img-fluid" width="200" height="200">
                                                <input type="file" class="form-control" id="foto_wanita" name="foto_wanita" accept="image/*">
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_prewed">Foto Prewedding</label>
                                                <img src="" class="d-block img-fluid" width="200" height="200">
                                                <input type="file" class="form-control" id="foto_prewed" name="foto_prewed" accept="image/*">
                                            </div>
                                        </div>

                                        <h4>Waktu acara resepsi tiap sesi</h4>
                                        <div class="mb-3">
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
                                            <div class="row">
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary btn-add mt-2 w-10"><i class="fas fa-plus-circle"></i></button> <br>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    @csrf
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>



@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

<script>

    // Fungsi untuk menangani aksi klik pada tombol .delete-undangan

    $('.delete-undangan').click(function () {

        // Mendapatkan nilai data-id dari tombol yang diklik

        var undanganId = $(this).data('id');



        // Set nilai input type hidden dengan id "undanganIdToDelete"

        $('#undanganIdToDelete').val(undanganId);

    });



    // Fungsi untuk menangani aksi hapus undangan

    function hapusUndangan() {

        // Mendapatkan nilai input type hidden dengan id "undanganIdToDelete"

        var undanganId = $('#undanganIdToDelete').val();



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $.ajax({

            type: 'DELETE',

            url: '/delete-undangan/' + undanganId,

            success: function(response) {

                // Tambahkan logika atau tindakan setelah berhasil menghapus

                console.log('Undangan berhasil dihapus');

                // Tutup modal

                $('#modalHapus').modal('hide');

            },

            error: function(error) {

                // Tambahkan logika atau tindakan jika terjadi kesalahan

                console.error('Terjadi kesalahan saat menghapus undangan:', error);

                // Tutup modal

                $('#modalHapus').modal('hide');

            }

        });

    }
</script>


{{-- script tambah undangan --}}
<script src="{{asset('FreeDash-lite-master/src')}}/dist/js/maps.js"></script>

<script>
    $(document).ready(function() {

        // Tombol Tambah
        $('.btn-add').on('click', function() {
            var container = $(this).closest('.modal-body');
            var inputCount = container.find('.input-row').length + 1;

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



            container.find('#input-container').append(newRow);
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

<script>
    $('#modalUndanganBaru .nama').select2({
        dropdownParent: $('#modalUndanganBaru')
    });

    $('#modalUndanganEdit .nama').select2({
        dropdownParent: $('#modalUndanganEdit')
    });
</script>

<script>
    // Edit Modal
    $(document).ready(function() {
        $('#zero_config .btn-primary').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            // reset form
            $('#modalUndanganEdit').parent().trigger('reset');
            $('#modalUndanganEdit').parent().attr('action', '/update-undangan/' + id);

            // ambil data undangan
            $.ajax({
                url: '/fetch-undangan/' + id,
                type: 'GET',
                success: function(response) {
                    // perbarui form
                    $('#modalUndanganEdit select[name="id_client"]').val(response.id_client).trigger('change');
                    $('#modalUndanganEdit input[name="nama_pria"]').val(response.nama_mempelai_pria);
                    $('#modalUndanganEdit input[name="nama_wanita"]').val(response.nama_mempelai_wanita);
                    $('#modalUndanganEdit input[name="ayah_pria"]').val(response.nama_ayah_pria);
                    $('#modalUndanganEdit input[name="ibu_pria"]').val(response.nama_ibu_pria);
                    $('#modalUndanganEdit input[name="ayah_wanita"]').val(response.nama_ayah_wanita);
                    $('#modalUndanganEdit input[name="ibu_wanita"]').val(response.nama_ibu_wanita);
                    $('#modalUndanganEdit textarea[name="lokasi"]').val(response.lokasi_acara);
                    $('#modalUndanganEdit textarea[name="alamat_pria"]').val(response.alamat_pria);
                    $('#modalUndanganEdit textarea[name="alamat_wanita"]').val(response.alamat_wanita);
                    $('#modalUndanganEdit input[name="maps"]').val(response.maps);
                    $('#modalUndanganEdit input[name="tanggal_akad"]').val(response.tgl_waktu_akad);
                    $('#modalUndanganEdit textarea[name="qoutes"]').text(response.quotes);
                    $('#modalUndanganEdit input[name="tema"]').filter('[value="' + response.tema + '"]').prop('checked', true);
                    $('#modalUndanganEdit input[name="foto_cover"]').closest('.mb-3').find('img').attr('src', response.foto_cover);
                    $('#modalUndanganEdit input[name="foto_pria"]').closest('.mb-3').find('img').attr('src', response.foto_pria);
                    $('#modalUndanganEdit input[name="foto_wanita"]').closest('.mb-3').find('img').attr('src', response.foto_wanita);
                    $('#modalUndanganEdit input[name="foto_prewed"]').closest('.mb-3').find('img').attr('src', response.foto_prewed);

                    // tema
                    console.log(response.tema)
                    if (response.tema == "1") {
                        console.log('tema 1');
                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema1.jpeg')}}" class="img-fluid" width="200" height="200">`);
                        $('#textEdit').html("TEMA <strong>1</strong>");
                    } else if (response.tema == "2") {
                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema2.jpeg')}}" class="img-fluid" width="200" height="200">`);
                        $('#textEdit').html("TEMA<strong>2</strong>");
                    } else if (response.tema == "3") {
                        $('#outputEdit').html(`<img src="{{asset('Undangan-Tema-1/assets/images/Tema3.jpg')}}" class="img-fluid" width="200" height="200">`);
                        $('#textEdit').html("TEMA<strong>3</strong>");
                    }

                    // sesi
                    $('#modalUndanganEdit #input-container').html('');
                    response.sesi.forEach(function(sesi, index) {
                        var inputCount = index + 1;
                        var newRow = $('<div class="input-row">' +

                            '<div class="row">' +

                            '<div class="col-lg-10">' +

                            '<input class="form-control mt-2" type="datetime-local" name="sesi[]" id="sesi_' + inputCount + '" value="' + sesi + '">' +

                            '</div>' +

                            '<div class="col-lg-2">' +

                            '<button class="btn btn-danger btn-remove"><i class="far fa-trash-alt"></i></button>' +

                            '</div>' +

                            '</div>' +

                            '</div>');

                        $('#modalUndanganEdit #input-container').append(newRow);
                    });
                }
            });
        });
    });
</script>

@endsection

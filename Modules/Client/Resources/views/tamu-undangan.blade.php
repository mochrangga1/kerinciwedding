@extends('layout.master')

@section('container')

 <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-7 align-self-center">

                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambahkan Data tamu undangan</h3>

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

                    <div class="col-sm-6 col-lg-3">

                        <div class="card border-end">

                            <div class="card-body">

                                <div class="d-flex align-items-center">

                                    <div>

                                        <div class="d-inline-flex align-items-center">

                                            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_tamu }}</h2>

                                        </div>

                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Tamu Diundang

                                        </h6>

                                    </div>

                                    <div class="ms-auto mt-md-3 mt-lg-0">

                                        <span class="opacity-7 text-muted"><i data-feather="user"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="card border-end">

                            <div class="card-body">

                                <div class="d-flex align-items-center">

                                    <div>

                                        <div class="d-inline-flex align-items-center">

                                            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_baca }}</h2>

                                        </div>

                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Undangan dibaca

                                        </h6>

                                    </div>

                                    <div class="ms-auto mt-md-3 mt-lg-0">

                                        <span class="opacity-7 text-muted"><i class="icon-notebook"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 col-lg-3">

                        <div class="card border-end">

                            <div class="card-body">

                                <div class="d-flex align-items-center">

                                    <div>

                                        <div class="d-inline-flex align-items-center">

                                            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_hadir }}</h2>

                                        </div>

                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Tamu Hadir

                                        </h6>

                                    </div>

                                    <div class="ms-auto mt-md-3 mt-lg-0">

                                        <span class="opacity-7 text-muted"><i class="icon-notebook"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Daftar Tamu</h4>

                                {{-- <a href="/undangan/{{$id_undangan}}/sesi/{{$sesi}}/client/{{$client->id_client}}/add-tamu" class="btn btn-primary"><i class="icon-plus"></i></a> --}}

                                {{-- <a href="/dash/add-tamu/{{$client}}/{{$code}}" class="btn btn-primary"><i class="icon-plus"></i></a> --}}
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="icon-plus"></i></button>

                                {{-- Impor tamu --}}
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal"><i class="icon-notebook"></i> Impor Tamu</button>

                                {{-- Kirim pesan undangan whatsapp ke semua tamu --}}
                                <button type="button" class="btn btn-warning" id="kirimUndanganWa"><i class="icon-notebook"></i> Kirim Undangan</button>

                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap dataTable">

                                    <thead>

                                        <tr>

                                            <td style="width: 1%;"><input type="checkbox" id="checkAll"></td>

                                            <td>#</td>

                                            <td>Nama Tamu</td>

                                            <td>Alamat</td>

                                            <td>No Hp</td>

                                            <td>URL</td>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($result as $tamu)

                                        <tr>
                                            <td style="width: 1%;"><input type="checkbox" name="tamu[]" value="{{$tamu->id_tamu}}"></td>

                                            <td>{{$loop->iteration}}</td>

                                            <td>{{$tamu->nama_tamu}}</td>

                                            <td>{{$tamu->alamat}}</td>

                                            <td>{{$tamu->no_hp}}</td>

                                            <td><button class="btn btn-success" id="copyButton" data-clipboard-text="{{ env('APP_URL') }}/undangan/unique/{{$tamu->kode}}"><i class="icon-docs"></i></button>

                                            <button class="btn btn-primary editButton" value="{{$tamu->id_tamu}}"><i class=" fas fa-pencil-alt"></i></button>

                                            <button class="btn btn-danger delete-tamu" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="{{$tamu->id_tamu}}"><i class="fas fa-trash-alt"></i></button>

                                            </td>

                                        </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>



                </div>



                <footer class="footer text-center text-muted">

                  Sanggar Rias Kerinci

                </footer>

                <!-- ============================================================== -->

                <!-- End footer -->

                <!-- ============================================================== -->

            </div>



            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Tamu</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        <form action="/dash/add-tamu" method="POST">

                            @csrf

                            <div class="col-lg-12">

                                <label for="nama_client">Nama</label>

                                <input type="text" class="form-control col-lg-6 @error('nama_client')is-invalid @enderror" id="add_nama" name="nama_tamu" required value="{{ old('name')}}">

                                @error('nama_client')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-lg-12">

                                <label for="no_hp">Alamat</label>

                                <textarea class="form-control col-lg-6 @error('no_hp')is-invalid @enderror" id="add_alamat" name="alamat" required value="{{ old('alamat')}}"></textarea>

                                @error('no_hp')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-lg-12">

                                <label for="no_hp">No hp</label>

                                <input type="number" class="form-control col-lg-6 @error('no_hp')is-invalid @enderror" id="add_phone" name="no_hp" required value="{{ old('username')}}">

                                @error('no_hp')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                    </div>

                                @enderror

                            </div>

                        </div>

                        <input type="hidden" name="id_sesi" value="{{$id_sesi}}">
                        <input type="hidden" name="id_undangan" value="{{$id_undangan}}">
                        <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>

                    </div>

                </div>

            </div>

            </div>

            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Impor Data Tamu</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        <form action="/dash/import-tamu" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="col-lg-12">

                                <input type="file" class="form-control col-lg-6 @error('file')is-invalid @enderror" id="file" name="file" required value="{{ old('file')}}" accept=".xlsx">

                                @error('file')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                    </div>

                                @enderror

                            </div>

                        </div>

                        <input type="hidden" name="id_sesi" value="{{$id_sesi}}">
                        <input type="hidden" name="id_undangan" value="{{$id_undangan}}">
                        <button type="submit" class="btn btn-primary">Impor</button>

                        </form>

                    </div>

                </div>

            </div>

            </div>


            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Tamu</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        <form action="/dash/update-tamu" method="POST">

                            @csrf

                            <div class="col-lg-12">

                                <input type="hidden" id="id_tamu" name="id_tamu">

                                <label for="nama_client">Nama</label>

                                <input type="text" class="form-control col-lg-6 @error('nama_client')is-invalid @enderror" id="edit_nama" name="nama_tamu" required value="{{ old('name')}}">

                                @error('nama_client')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-lg-12">

                                <label for="no_hp">Alamat</label>

                                <textarea class="form-control col-lg-6 @error('no_hp')is-invalid @enderror" id="edit_alamat" name="alamat" required value="{{ old('alamat')}}"></textarea>

                                @error('no_hp')

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

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>

                    </div>

                </div>

            </div>

            </div>

            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        Apakah Anda yakin ingin menghapus tamu ini?

                    </div>

                    <div class="modal-footer">

                        <input type="hidden" id="tamuIdToDelete" value="">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <button type="button" class="btn btn-danger" onclick="hapusTamu()">Hapus</button>

                    </div>

                  </div>

                </div>

              </div>

            <div class="modal fade" id="modalWaSukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="modalWaSuksesLabel">Sukses</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        Pesan Undangan berhasil dikirim

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Ok</button>

                    </div>

                  </div>

                </div>

              </div>

              <div class="modal fade" id="modalWaGagal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="modalWaGagalLabel">Gagal</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        Anda belum melakukan integrasi dengan WhatsApp!

                    </div>

                    <div class="modal-footer">

                        <a href="/dash/client/whatsapp/{{$client}}" class="btn btn-success">Integrasi</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>

                    </div>

                  </div>

                </div>

              </div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
    // checkbox all
    $('#checkAll').click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // kirim undangan whatsapp
    $('#kirimUndanganWa').click(function () {
        var tamu = [];
        $('input[name="tamu[]"]:checked').each(function () {
            tamu.push($(this).val());
        });

        if (tamu.length == 0) {
            alert('Pilih tamu terlebih dahulu');
            return;
        }

        axios({
            method: 'post',
            url: '/dash/undangan/{{$client}}/tamu/{{$code}}/whatsapp',
            data: {
                tamu: tamu
            }
        })
        .then(function (response) {
            $('#modalWaSukses').modal('show');
        })
        .catch(function (error) {
            console.error('Terjadi kesalahan saat mengirim pesan:', error);
            $('#modalWaGagal .modal-body').html(error.response.data.message);
            $('#modalWaGagal').modal('show');
        });
    });
</script>

<script>

    // Fetch data from the controller method

    axios.get('/dash/chart-data')

        .then(response => {

            var data = response.data;

            var months = [];

            var totals = [];



            data.forEach(item => {

                months.push(item.month);

                totals.push(item.total);

            });



            createChart(months, totals);

        })

        .catch(error => {

            console.error('Error fetching data:', error);

        });



    // Fungsi untuk membuat chart

    function createChart(months, totals) {

        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {

            type: 'line',

            data: {

                labels: months,

                datasets: [{

                    label: 'Undangan Dibuat',

                    data: totals,

                    backgroundColor: 'rgba(75, 192, 192, 0.2)',

                    borderColor: 'rgba(75, 192, 192, 1)',

                    borderWidth: 1

                }]

            },

            options: {

                scales: {

                    y: {

                        beginAtZero: true

                    }

                }

            }

        });

    }

</script>

<script>

    // Inisialisasi ClipboardJS dengan memilih elemen berdasarkan ID

    var clipboard = new ClipboardJS('#copyButton');



    // Event handler saat berhasil menyalin

    clipboard.on('success', function (e) {

        // Beri umpan balik atau tindakan lain setelah berhasil menyalin

        alert('Teks telah disalin: ' + e.text);

    });



    // Event handler saat gagal menyalin

    clipboard.on('error', function (e) {

        console.error('Gagal menyalin teks: ', e.action);

    });

</script>

<script>

    $(document).ready(function () {



        $('.editButton').click(function () {

            var id = $(this).val();



            $.ajax({

                type: 'GET',

                url: '/dash/get-data-tamu/' + id,

                success: function (response) {

                    $('#id_tamu').val(response.id_tamu);

                    $('#edit_nama').val(response.nama_tamu);

                    $('#edit_alamat').val(response.alamat);

                    $('#edit_phone').val(response.no_hp);

                    $('#editModal').modal('show');

                    console.log(response);

                },

                error: function (error) {

                    console.error(error);

                    alert('Terjadi kesalahan saat mengambil data.');

                }

            });

        });

    });

    $('.delete-tamu').click(function () {

        var tamuId = $(this).data('id');

        $('#tamuIdToDelete').val(tamuId);

    });

    function hapusTamu() {

        var tamuId = $('#tamuIdToDelete').val();

        // console.log(tamuId);

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $.ajax({

            type: 'DELETE',

            url: '/dash/delete-tamu/' + tamuId,

            success: function(response) {



                console.log('tamu berhasil dihapus');

                $('#modalHapus').modal('hide');

                location.reload();

            },

            error: function(error) {



                console.error('Terjadi kesalahan saat menghapus tamu:', error);



                $('#modalHapus').modal('hide');

            }

        });

    }

</script>

@endsection

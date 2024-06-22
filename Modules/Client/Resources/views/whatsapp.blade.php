@extends('layout.master')

@section('container')

 <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-7 align-self-center">

                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang {{ $data_client->nama_client }}</h3>

                        <div class="d-flex align-items-center">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb m-0 p-0">

                                    <li class="breadcrumb-item"><a href="#">WhatsApp</a>

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

                                <h4 class="card-title">WhatsApp Saya</h4>

                                @if (!$whatsapp)
                                <div class="row">
                                    <div class="col-4">
                                        <img id="qr" src="" alt="QR Code WhatsApp" style="display: none">
                                    </div>
                                    <div class="col-8">
                                        <p>Scan QR Code ini untuk mengintegrasikan WhatsApp Anda dengan sistem kami.</p>
                                        <ol>
                                            <li>Buka WhatsApp di ponsel Anda</li>
                                            <li>Ketuk tombol menu titik tiga di sudut kanan atas</li>
                                            <li>Pilih "Perangkat Tertaut" dan pilih "Tautkan Perangkat Baru"</li>
                                            <li>Arahkan kamera ponsel Anda ke QR Code ini</li>
                                        </ol>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <p>WhatsApp Anda sudah terintegrasi dengan sistem kami.</p>
                                    <div class="col-6">
                                        <p>Anda dapat mengirimkan pesan untuk mengundang tamu dengan menekan tombol di bawah ini.</p>
                                        <a href="/dash/undangan/client/{{ $client }}" class="btn btn-success">Kirim Pesan</a>
                                    </div>
                                    <div class="col-6">
                                        <p>Anda juga dapat melepaskan integrasi dengan mengklik tombol di bawah ini.</p>
                                        <button class="btn btn-danger delete-whatsapp" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="{{$data_client->id_client}}">Hapus Integrasi</button>
                                    </div>
                                </div>
                                @endif

                            </div>

                        </div>

                    </div>



                </div>



                <footer class="footer text-center text-muted">

                    All Rights Reserved by Freedash. Designed and Developed by <a

                        href="https://adminmart.com/">Adminmart</a>.

                </footer>

                <!-- ============================================================== -->

                <!-- End footer -->

                <!-- ============================================================== -->

            </div>

            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>

                    <div class="modal-body">

                        Apakah Anda yakin ingin menghapus integrasi whatsapp?

                    </div>

                    <div class="modal-footer">

                        <input type="hidden" id="tamuIdToDelete" value="">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <button type="button" class="btn btn-danger" onclick="hapusWA()">Hapus</button>

                    </div>

                  </div>

                </div>

              </div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

{{-- Proses integrasi WA di depan --}}
@if (!$whatsapp)
    <script>
    function ambil_qr() {
        // ambil kode qr dari gateway wa
        axios.get('{{ env("WHATSAPP_URL", "http://localhost:5001") }}/start-session?session={{ $data_client->id_client }}')
        .then(response => {
            document.getElementById('qr').src = response.data.data.qr;
            document.getElementById('qr').style.display = 'block';
        })
        .catch(error => {
            console.error(error);
        });
    }

    ambil_qr();
    setInterval(() => {
        ambil_qr();
    }, 10000);

    // setiap 5 detik apakah klien sudah sukses menscan kode qr dan tersimpan di data gateway
    setInterval(() => {
        axios.get('{{ env("WHATSAPP_URL", "http://localhost:5001") }}/sessions?key=mysupersecretkey')
        .then(response => {
            // cek apakah sesi sudah tersimpan di data gatway wa
            if (response.data.data.includes('{{ $data_client->id_client }}')) {
                // untuk menyimpan id sesi dari gateway ke tabel WhatsApp di Laravel
                axios.post('/dash/client/whatsapp/{{ $data_client->id_client }}')
                .then(response => {
                    
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
            }
        })
        .catch(error => {
            console.error(error);
        });
    }, 5000);
    </script>
@endif

<script>
    function hapusWA() {
        // hapus sesi dari gateway
        axios.get('{{ env("WHATSAPP_URL", "http://localhost:5001") }}/delete-session?session={{ $data_client->id_client }}')
        .then(response => {
            // hapus sesi dari tabel wa laravel
            axios.delete('/dash/client/whatsapp/{{ $data_client->id_client }}')
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                console.error(error);
            });
        })
    }
</script>

@endsection

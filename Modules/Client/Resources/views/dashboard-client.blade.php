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

                                <h4 class="card-title">Undangan Saya</h4>

                                <ol class="list-group list-group-numbered">

                                    @foreach ($undangan as $ud)

                                    <li class="list-group-item d-flex justify-content-between align-items-start">

                                      <div class="ms-2 me-auto">

                                        <div class="fw-bold">Undangan {{$loop->iteration}}</div>

                                       {{$ud->nama_mempelai_pria}} & {{$ud->nama_mempelai_wanita}} Sesi {{$ud->sesi}}

                                      </div>

                                      <a href="/undangan/{{$ud->kode}}">

                                      <span class="badge bg-warning rounded-pill py-1 px-3 mx-1">
                                        <i class="icon-eye" style="font-size: 16px;"></i>
                                        <small class="d-block" style="font-size:11px;">Preview</small>
                                      </span>

                                      </a>

                                      <a href="/dash/undangan/{{$data_client->kode}}/tamu/{{$ud->kode}}">

                                      <span class="badge bg-primary rounded-pill py-1 px-3 mx-1">
                                        <i class="icon-people" style="font-size: 16px;"></i>
                                        <small class="d-block" style="font-size:11px;">Daftar Tamu</small>
                                      </span>

                                      </a>

                                      <a href="/dash/undangan/{{$data_client->kode}}/buku-tamu/{{$ud->kode}}">
                                        <span class="badge bg-success rounded-pill py-1 px-3 mx-1">
                                            <i class="icon-printer" style="font-size: 16px;"></i>
                                            <small class="d-block" style="font-size:11px;">Buku Tamu</small>
                                        </span>
                                      </a>

                                    </li>

                                    @endforeach

                                  </ol>

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



@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

<script>

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

            type: 'horizontalBar',

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

@endsection

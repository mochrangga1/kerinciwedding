@extends('layout.master')

@section('container')

 <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-7 align-self-center">

                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang {{ auth()->user()->name}}</h3>

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

                                            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_client }}</h2>

                                        </div>

                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Clients

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

                                            <h2 class="text-dark mb-1 font-weight-medium">{{ $total_undangan }}</h2>

                                        </div>

                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Undangan

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

                <!-- *************************************************************** -->

                <!-- End First Cards -->

                <!-- *************************************************************** -->

                <!-- *************************************************************** -->

                <!-- Start Sales Charts Section -->

                <!-- *************************************************************** -->

                <div class="row">

                  

                        <div class="card">

                            <div class="card-body">

                                <div>

                                    <canvas id="myChart" width="400" height="200"></canvas>

                                </div>

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

               Sanggar Rias Kerinci

            </footer>

            <!-- ============================================================== -->

            <!-- End footer -->

            <!-- ============================================================== -->

        </div>

        

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"></script>

<script>

    // Fetch data from the controller method

    axios.get('/chart-data')

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

            type: 'bar',

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
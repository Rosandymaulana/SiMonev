@extends('layouts.index')
@section('content')

<head>

</head>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Selamat Datang di SiMonev!</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li> --}}
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="mb-0 text-secondary">Proyek Belum Dimulai</p>
                      <h4 class="my-3 text-info">{{ $jmlProyekBlmDimulai }}</h4>
                      {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                    </div>
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-up"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="mb-0 text-secondary">Proyek Dalam Progress</p>
                      <h4 class="my-3 text-info">{{ $jmlProyekDlmProgress }}</h4>
                      {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                    </div>
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-up"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <div class="col-xxl-6 col-md-6">
              <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="mb-0 text-secondary">Proyek Selesai</p>
                      <h4 class="my-3 text-info">{{ $jmlProyekSelesai }}</h4>
                      {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                    </div>
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-check"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-6 col-md-6">
              <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <p class="mb-0 text-secondary">Jumlah Usulan</p>
                      <h4 class="my-3 text-info">{{ $jmlUsulan }}</h4>
                      {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                    </div>
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-up"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar CHart</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                                          new Chart(document.querySelector('#barChart'), {
                                            type: 'bar',
                                            data: {
                                              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                              datasets: [{
                                                label: 'Bar Chart',
                                                data: [65, 59, 80, 81, 56, 55, 40],
                                                backgroundColor: [
                                                  'rgba(255, 99, 132, 0.2)',
                                                  'rgba(255, 159, 64, 0.2)',
                                                  'rgba(255, 205, 86, 0.2)',
                                                  'rgba(75, 192, 192, 0.2)',
                                                  'rgba(54, 162, 235, 0.2)',
                                                  'rgba(153, 102, 255, 0.2)',
                                                  'rgba(201, 203, 207, 0.2)'
                                                ],
                                                borderColor: [
                                                  'rgb(255, 99, 132)',
                                                  'rgb(255, 159, 64)',
                                                  'rgb(255, 205, 86)',
                                                  'rgb(75, 192, 192)',
                                                  'rgb(54, 162, 235)',
                                                  'rgb(153, 102, 255)',
                                                  'rgb(201, 203, 207)'
                                                ],
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
                                        });
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bar CHart</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                                                                  new Chart(document.querySelector('#barChart'), {
                                                                    type: 'bar',
                                                                    data: {
                                                                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                                      datasets: [{
                                                                        label: 'Bar Chart',
                                                                        data: [65, 59, 80, 81, 56, 55, 40],
                                                                        backgroundColor: [
                                                                          'rgba(255, 99, 132, 0.2)',
                                                                          'rgba(255, 159, 64, 0.2)',
                                                                          'rgba(255, 205, 86, 0.2)',
                                                                          'rgba(75, 192, 192, 0.2)',
                                                                          'rgba(54, 162, 235, 0.2)',
                                                                          'rgba(153, 102, 255, 0.2)',
                                                                          'rgba(201, 203, 207, 0.2)'
                                                                        ],
                                                                        borderColor: [
                                                                          'rgb(255, 99, 132)',
                                                                          'rgb(255, 159, 64)',
                                                                          'rgb(255, 205, 86)',
                                                                          'rgb(75, 192, 192)',
                                                                          'rgb(54, 162, 235)',
                                                                          'rgb(153, 102, 255)',
                                                                          'rgb(201, 203, 207)'
                                                                        ],
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
                                                                });
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                          series: [{
                            name: 'Alat Kantor',
                            data: [31, 40, 28, 51, 42, 82, 56],
                          }, {
                            name: 'ELektronik',
                            data: [11, 32, 45, 32, 34, 52, 41]
                          }, {
                            name: 'Rumah Tangga',
                            data: [15, 11, 32, 18, 9, 24, 11]
                          }],
                          chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                              show: false
                            },
                          },
                          markers: {
                            size: 4
                          },
                          colors: ['#4154f1', '#2eca6a', '#ff771d'],
                          fill: {
                            type: "gradient",
                            gradient: {
                              shadeIntensity: 1,
                              opacityFrom: 0.3,
                              opacityTo: 0.4,
                              stops: [0, 90, 100]
                            }
                          },
                          dataLabels: {
                            enabled: false
                          },
                          stroke: {
                            curve: 'smooth',
                            width: 2
                          },
                          xaxis: {
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                          },
                          
                        }).render();
                      });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
</body>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('style/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('style/img/apple-touch-icon.pn') }}g" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('style/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('style/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('style/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

</head>

<body>

  @include('layouts.header')
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('tabel_usulan') }}">
          <i class="bi bi-table"></i>
          <span>Tabel Usulan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('peta_usulan') }}">
          <i class="bi bi-map"></i>
          <span>Peta Usulan</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  @yield('content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('style/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('style/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('style/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('style/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('style/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('style/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('style/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('style/js/main.js') }}"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
    let table = new DataTable('#myTable', {
    responsive: true
    });
  </script>
</body>

</html>
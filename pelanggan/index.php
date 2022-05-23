<?php
session_start();

if (!isset($_SESSION["username"])) {
  echo "<script> alert('Anda harus login terlebih dahulu')</script>";
  echo "<script> location='../index.php'</script>";
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Restoran | Aia Badarun</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>


  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
</head>
<body>

<!-- muali header -->
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php?p=home">Aia Badarun</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php">Sign out</a>
      </div>
    </div>
  </header>
<!-- akhir header -->



  <div class="container-fluid">
    <div class="row">

<!-- mulai side bar -->

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <!-- <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php?p=data_kat">
                <span data-feather="home"></span>
                Data Kategori
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_menu">
                <span data-feather="file"></span>
                Data Menu
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_user">
                <span data-feather="users"></span>
                Data User
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_pelanggan">
                <span data-feather="users"></span>
                Data Pelanggan
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_pesantempat">
                <span data-feather="shopping-cart"></span>
                Data Pesanan Tempat
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_pesanonline">
                <span data-feather="bar-chart-2"></span>
                Data Pesanan Online
              </a>
            </li> -->

          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <!-- <span>Laporan</span> -->

          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_bayar_tempat">
                <span data-feather="file-text"></span>
                Cetak Struk Pesanan Tempat
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?p=data_bayar_online">
                <span data-feather="file-text"></span>
                Cetak Struk Pesanan Online
              </a>
            </li>

          </ul>
        </div>
      </nav>

<!-- akhir sidebar -->

<!-- kelas utama -->
    <div class="col">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <?php
      $p=isset($_GET['p']) ? $_GET['p'] : 'home';
      if ($p=='home') include('user.php');
      if ($p=='data_kat') include('data_kategori.php');
      if ($p=='data_menu') include('data_menu.php');
      if ($p=='data_user') include('data_user.php');
      if ($p=='input_kat') include('input/input_kat.php');
      if ($p=='input_menu') include('input/input_menu.php');
      if ($p=='input_user') include('input/input_user.php');
      if ($p=='edit_kat') include('edit/edit_kat.php');
      if ($p=='edit_menu') include('edit/edit_menu.php');
      if ($p=='edit_user') include('edit/edit_user.php');
      if ($p=='data_pesantempat') include('data_pesantempat.php');
      if ($p=='data_pesanonline') include('data_pesanonline.php');
      if ($p=='data_bayar') include('data_bayar.php');
      if ($p=='data_pelanggan') include('data_pelanggan.php');
      if ($p=='data_bayar_tempat') include('data_bayar_tempat.php');
      if ($p=='data_bayar_online') include('data_bayar_online.php');
      if ($p=='print_kategori') include('print/print_kategori.php');
      if ($p=='print_menu') include('print/print_menu.php');
      if ($p=='print_user') include('print/print_user.php');
      if ($p=='pilih_pesan') include('pilih_pesan.php');
      if ($p=='pesan_tempat') include('pesan_tempat.php');
      if ($p=='pesan_online') include('pesan_online.php');
      if ($p=='bayar_tempat') include('bayar_tempat.php');
      if ($p=='bayar_online') include('bayar_online.php');
      if ($p=='print_laporan_pembayaran_tempat') include ('print/print_laporan_pembayaran_tempat.php');
      if ($p=='print_laporan_pembayaran_online') include ('print/print_laporan_pembayaran_online.php');
      if ($p=='print_struck_tempat') include ('print/print_struck_tempat.php');
      if ($p=='print_struck_online') include ('print/print_struck_online.php');
     ?>
   </div>
 </main>
</div>

    </div>
  </div>

<!-- akhir class utama -->

  <script src="../js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../js/dashboard.js"></script>
</body>
</html>

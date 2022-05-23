<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- my css -->
  <style media="screen">
  body{
    background-color: #e2edff;
  }
  section{
    scroll-margin-top: 60px;
    padding-top:  5rem;
  }
  </style>



  <title>Restoran | Aia Badarun</title>
</head>
<body id="home">

  <!-- navbar -->
  <nav class="p-3 fixed-top bg-dark opacity-75 ">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <img src="../img/restoran.png" alt="" width="48" height="40">
        <span class="text-light">Aia Badarun</span>
      </a>
      <ul class="nav float-end col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link text-light">Home</a></li>
        <li><a href="menu.php" class="nav-link text-light">Menu</a></li>
        <li><a href="transaksi.php" class="nav-link text-light">Transaksi</a></li>
      </ul>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- menu -->
    <section id="menu">
      <div class="container pb-5">
        <div class="row mb-5">
          <div class="col text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Makanan</h5>
            <h2>MENU</h2>
          </div>
        </div>
        <div class="row">
          <div class="container">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
              <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" name="kategori">
                  <?php
                  include "../koneksi.php";
                  //Perintah sql untuk menampilkan semua question data pada tabel kategori
                  $sql="select * from kategori";
                  $hasil=mysqli_query($kon,$sql);
                  $no=0;
                  while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                    $ket="";
                    if (isset($_GET['kategori'])) {
                      $kategori = trim($_GET['kategori']);
                      if ($kategori==$data['id_kategori'])
                      {
                        $ket="selected";
                      }
                    }
                    ?>
                    <option <?php echo $ket; ?> value="<?php echo $data['id_kategori'];?>"><?php echo
                    $data['nama_kategori'];?></option><?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <input type="hidden" name="p" value="data_menu">
                <input type="submit" class="btn btn-info float-end my-2 " value="Pilih">
              </div>
            </form>
            <table class="table table-bordered table-hover">
              <br>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php
              if (isset($_GET['kategori'])) {
                $kategori = trim($_GET['kategori']);
                // print_r($kategori);
                $sql=" select * from menu left join kategori on menu.id_kategori = kategori.id_kategori where menu.id_kategori='$kategori' order by id_menu asc ";}
                else {
                  $sql=" select * from menu left join kategori on menu.id_kategori = kategori.id_kategori order by id_menu asc ";
                }
                $hasil=mysqli_query($kon,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                  $no++;
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data["id_kategori"]; ?></td>
                      <td><?php echo $data["nama_menu"]; ?></td>
                      <td><?php echo $data["harga"]; ?></td>
                      <td><?php echo $data["keterangan"]; ?></td>
                      <td>
                        <a href="pesan.php?id_menu=<?php echo $data["id_menu"] ?>"  class="btn btn-primary ">Pesan</a>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                }
                ?>
              </table>
            </div>
        </div>
      </div>
    </section>
  <!-- akhir menu -->


</body>
</html>

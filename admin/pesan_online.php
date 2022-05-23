<?php
include ("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
  case 'list' :
  ?>
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
      include '../koneksi.php';
      $ambil=mysqli_query($kon,"SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'");
      $data=mysqli_fetch_array($ambil);
      ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pesanan</h1>
      </div>
      <div class="container">
        <form class="row g-3" action="" method="post">
          <div class="row mb-3">
            <label class="label-control">Nama Pelanggan</label>
            <div class="col-sm-10">
              <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['nama_plgn'];?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label for="sel1">Pilih Menu:</label>
            <div class="col-sm-10">
              <select class="form-control" name="id_menu">
                <?php
                include "koneksi.php";
                //Perintah sql untuk menampilkan semua question data pada tabel kategori
                $sql="select * from menu";
                $hasil=mysqli_query($kon,$sql);
                $no=0;
                while ($data2 = mysqli_fetch_array($hasil)) {
                  $no++;
                  ?>
                  <option value="<?php echo $data2['id_menu'];?>"><?php echo $data2['nama_menu'];?></option>
                  <?php

                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="label-control">Jumlah</label>
            <div class="col-sm-10">
              <input type="text" name="jumlah_pesan" class="form-control">
            </div>
          </div>
          <div>
            <div class="row- col-2">
              <button type="submit" name="submit" class="btn btn-danger mb-3" onclick="return confirm('Apakah data pesanan sudah benar?');">Pesan</button>
            </div>
          </div>
          <?php

          if (isset($_POST['submit'])){
            include 'koneksi.php';
            $q = mysqli_query($kon,"INSERT INTO pesan_online(id_pesan, id_menu, id_pelanggan, jumlah_pesan, ongkir, status_bayar) VALUES(null, '$_POST[id_menu]',  '$_GET[id_pelanggan]','$_POST[jumlah_pesan]',10000,'belum bayar')");

          }
          ?>
        </form>
      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pesanan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <div class="container">

        <table class="table table-bordered table-hover">
          <br>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Nama Menu</th>
              <th>Jumlah Pesan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $no=1;
            $tampil=mysqli_query($kon,"SELECT * FROM menu JOIN pesan_online USING(id_menu) JOIN pelanggan USING(id_pelanggan) WHERE id_pelanggan='$_GET[id_pelanggan]' and status_bayar='belum bayar';");
            while ($data=mysqli_fetch_array($tampil)) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_plgn']; ?></td>
                <td><?php echo $data['nama_menu']; ?></td>
                <td><?php echo $data['jumlah_pesan']; ?></td>
                <td><?php echo $data['status_bayar']; ?></td>
                <td><a href=?p=pesan_online&aksi=hapus&id=<?php echo $data['id_pesan']; ?> onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm">Hapus </a> |
                  <a href="index.php?p=bayar_online&id_pesan=<?php echo $data['id_pesan']; ?>" class="btn btn-success btn-sm">Bayar</a></td>
                </tr>
                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php

      break;
      case 'hapus':
      $q2=mysqli_query($kon,"DELETE FROM pesan_online WHERE id_pesan='$_GET[id]'");
      if ($q2) {
        echo "<script> location='index.php?p=data_pelanggan'</script>";
      }
        break;
    }
       ?>

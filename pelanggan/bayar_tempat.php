<div class="row">
    <?php
    include 'koneksi.php';
    $ambil=mysqli_query($kon,"SELECT * FROM menu JOIN pesan_tempat USING(id_menu) JOIN pelanggan USING(id_pelanggan) WHERE id_pesan='$_GET[id_pesan]'");
    $data=mysqli_fetch_array($ambil);
    ?>
    <h1 class="h2">Pembayaran</h1>
    <hr>
    <div class="container mt-3">
      <form class="row g-3" action="" method="post">
        <div class="row mb-3">
          <label class="label-control">Nama Pelanggan</label>
          <div class="col-sm-10">
            <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $data['nama_plgn'];?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" name="nama_menu" class="form-control" value="<?php echo $data['nama_menu'];?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Harga Menu</label>
          <div class="col-sm-10">
            <input type="text" name="harga_menu" class="form-control" value="<?php echo $data['harga'];?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Jumlah Pesan</label>
          <div class="col-sm-10">
            <input type="text" name="jumlah_pesan" class="form-control" value="<?php echo $data['jumlah_pesan'];?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Harga Total</label>
          <div class="col-sm-10">
            <input type="text" name="total_bayar" class="form-control" value="<?php echo ($data['jumlah_pesan']*$data['harga']);?>" readonly>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Jumlah Bayar</label>
          <div class="col-sm-10">
            <input type="text" name="jumlah_bayar" class="form-control">
          </div>
        </div>
        <div>
          <div class="row- col-2 float-end me-5">
          <button type="cancel" name="cancel" class="btn btn-danger mb-3" onclick="return confirm('Apakah data pesanan sudah benar?');">Batal</button>
            <button type="submit" name="submit" class="btn btn-primary mb-3" onclick="return confirm('Apakah data pesanan sudah benar?');">Simpan</button>
          </div>
        </div>
        <?php

        if (isset($_POST['submit'])){
          include 'koneksi.php';
          $jumlah_bayar = $_POST['jumlah_bayar'];
          $total_bayar = $_POST['total_bayar'];
          if ($jumlah_bayar>=$total_bayar) {
              $q = mysqli_query($kon,"INSERT INTO pembayaran_tempat(id_bayar_tempat, id_pesan, harga_total, jumlah_bayar) VALUES(null, '$_GET[id_pesan]','$total_bayar','$jumlah_bayar')");
              if ($q) {
                $q2= mysqli_query($kon,"UPDATE `pesan_tempat` SET `status_bayar` = 'sudah bayar' WHERE `pesan_tempat`.`id_pesan` = '$_GET[id_pesan]'");
                if ($q2) {
                    echo "<script> location='index.php?p=data_bayar_tempat'</script>";
                }
              }
          }
          else {
            ?>
            <script>
              alert("Pembayaran Kurang!!")
            </script>
          <?php
          }

        }
        ?>
        </form>
    </div>
</div>

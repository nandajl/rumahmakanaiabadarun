<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php
  include '../koneksi.php';
  $ambil=mysqli_query($kon,"SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
  $data=mysqli_fetch_array($ambil);
  ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Menu</h1>
  </div>
    <div class="container">
      <form class="row g-3" action="" method="post">
        <div class="row mb-3">
          <label for="sel1">Kategori :</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategori">
              <?php
              include "../koneksi.php";
              //Perintah sql untuk menampilkan semua question data pada tabel kategori
              $sql="select * from kategori";
              $hasil=mysqli_query($kon,$sql);
              $no=0;
              while ($data2 = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <option value="<?php echo $data['id_kategori'];?>">
                        <?php echo $data2['nama_kategori'];?></option>
                        <?php
                }
                        ?>
              </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_menu'];?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Harga</label>
          <div class="col-sm-10">
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga'];?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Keterangan</label>
          <div class="col-sm-10">
            <textarea name="keterangan" class="form-control"><?php echo $data['keterangan']; ?></textarea>
          </div>
        </div>

        <div>
          <div class="row- col-2">
            <button type="submit" name="submit" class="btn btn-danger mb-3">Submit</button>
          </div>
        </div>
      <?php

      if (isset($_POST['submit'])){
        include '../koneksi.php';
        $q = mysqli_query($kon,"UPDATE menu SET id_kategori ='$_POST[kategori]', nama_menu='$_POST[nama]', harga='$_POST[harga]', keterangan='$_POST[keterangan]' WHERE id_menu='$_GET[id_menu]'");
        if ($q) {
                echo "<script> location='index.php?p=data_menu'</script>";
        }
        else {

        }
      }
      ?>
      </form>
  </div>
</main>

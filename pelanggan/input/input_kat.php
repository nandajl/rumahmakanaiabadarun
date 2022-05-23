<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data Kategori</h1>
  </div>
    <div class="container">
      <form class="row g-3" action="" method="post">
        <div class="row mb-3">
          <label class="label-control">Nama Kategori</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control">
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
        $q = mysqli_query($kon,"INSERT INTO kategori(id_kategori, nama_kategori) VALUES(null, '$_POST[nama]') ");
        if ($q) {
                echo "<script> location='index.php?p=data_kat'</script>";
        }
        else {

        }
      }
      ?>
      </form>
  </div>
</main>

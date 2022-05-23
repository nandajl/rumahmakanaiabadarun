<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php
  include '../koneksi.php';
  $ambil=mysqli_query($kon,"SELECT * FROM kategori WHERE id_kategori='$_GET[id_kat]'");
  $data=mysqli_fetch_array($ambil);
  ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data Kategori</h1>
  </div>
    <div class="container">
      <form class="row g-3" action="" method="post">
        <div class="row mb-3">
          <label class="label-control">Id Kategori</label>
          <div class="col-sm-10">
            <input type="text" name="id_kat" class="form-control" value="<?= $data['id_kategori'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Nama Kategori</label>
          <div class="col-sm-10">
            <input type="text" name="nama_kat" class="form-control" value="<?= $data['nama_kategori'] ?>">
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
        $q = mysqli_query($kon,"UPDATE kategori SET id_kategori='$_POST[id_kat]', nama_kategori='$_POST[nama_kat]' WHERE id_kategori='$_GET[id_kat]'");
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

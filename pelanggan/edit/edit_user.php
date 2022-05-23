<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php
  include '../koneksi.php';
  $ambil=mysqli_query($kon,"SELECT * FROM user WHERE id_user='$_GET[id_user]'");
  $data=mysqli_fetch_array($ambil);
  ?>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data User</h1>
  </div>
    <div class="container">
      <form class="row g-3" action="" method="post">
        <div class="row mb-3">
          <label for="sel1">Hak Akses :</label>
          <div class="col-sm-10">
            <select class="form-control" name="akses">
              <?php
              include "../koneksi.php";
              //Perintah sql untuk menampilkan semua question data pada tabel kategori
              $sql="select * from akses";
              $hasil=mysqli_query($kon,$sql);
              $no=0;
              while ($data2 = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <option value="<?php echo $data['id_user'];?>">
                        <?php echo $data2['nama_jabatan'];?></option>
                        <?php
                }
                        ?>
              </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Username</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" value="<?php echo $data['username'];?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" value="<?php echo $data['password'];?>">
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
        $password = md5($_POST['password']);
        $q = mysqli_query($kon,"UPDATE user SET id_akses='$_POST[akses]', username ='$_POST[nama]', email='$_POST[email]', password='$password' WHERE id_user='$_GET[id_user]'");
        if ($q) {
                echo "<script> location='index.php?p=data_user'</script>";
        }
        else {

        }
      }
      ?>
      </form>
  </div>
</main>

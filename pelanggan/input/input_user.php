<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data User</h1>
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
              while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <option value="<?php echo $data['id_akses'];?>">
                        <?php echo $data['nama_jabatan'];?></option>
                        <?php
                }
                        ?>
              </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Username</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control">
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
        $q = mysqli_query($kon,"INSERT INTO user(id_user, id_akses, username, email, password) VALUES(null, '$_POST[akses]','$_POST[nama]','$_POST[email]','$password') ");
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

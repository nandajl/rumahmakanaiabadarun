<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="index.php?p=print_user">
          <button type="button" class="btn btn-sm btn-outline-secondary">Cetak</button>
        </a>
        </div>
    </div>
  </div>
    <div class="container">

      <table class="table table-bordered table-hover">
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>ID user</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
        include '../koneksi.php';
        $sql="SELECT * FROM `user` left JOIN akses on user.id_akses = akses.id_akses";
        if (isset($_GET['kategori'])) {
          $kategori = trim($_GET['kategori']);
          $sql="SELECT * FROM `user` left JOIN akses on user.id_akses = akses.id_akses";}
          $hasil=mysqli_query($kon,$sql);
          $no=0;
          while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_user"]; ?></td>
                <td><?php echo $data["username"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td><?php echo $data["nama_jabatan"]; ?></td>
                <td>
                    <a href="index.php?p=edit_user&id_user=<?php echo $data["id_user"] ?>"  class="btn btn-primary btn-sm">Ubah</a>  ||
                    <a href="hapus/hapus_user.php?id_user=<?php echo $data['id_user'] ?>" onclick="return confirm('hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
            </tbody>
            <?php
          }
          ?>
        </table>
        <a href="index.php?p=input_user" class="btn btn-outline-dark float-end">Tambah Data</a>
      </div>
    </div>
  </div>
</main>

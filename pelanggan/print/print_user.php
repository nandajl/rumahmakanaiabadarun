<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
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
              </tr>
            </tbody>
            <?php
          }
          ?>
        </table>
        </div>
</main>
<script type="text/javascript">
  window.print();
</script>

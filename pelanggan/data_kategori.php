<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kategori</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="index.php?p=print_kategori">
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
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
        include '../koneksi.php';
        $sql="select * from kategori order by id_kategori asc ";
        if (isset($_GET['kategori'])) {
          $kategori = trim($_GET['kategori']);
          $sql="select * from kategori order by id_kategori asc ";}
          $hasil=mysqli_query($kon,$sql);
          $no=0;
          while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_kategori"]; ?></td>
                <td><?php echo $data["nama_kategori"]; ?></td>
                <td>
                    <a href="index.php?p=edit_kat&id_kat=<?php echo $data["id_kategori"] ?>"  class="btn btn-primary btn-sm">Ubah</a>  ||
                    <a href="hapus/hapus_kat.php?id_kat=<?php echo $data["id_kategori"] ?>"  class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
            </tbody>
            <?php
          }
          ?>
        </table>
        <a href="index.php?p=input_kat" class="btn btn-outline-dark float-end">Tambah Data</a>
      </div>
</main>

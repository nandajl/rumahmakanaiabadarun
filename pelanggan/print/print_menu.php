<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Menu</h1>
  </div>
    <div class="container">
      
      <table class="table table-bordered table-hover">
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <?php
        include "../koneksi.php";
        if (isset($_GET['kategori'])) {
          $kategori = trim($_GET['kategori']);
          // print_r($kategori);
          $sql=" select * from menu left join kategori on menu.id_kategori = kategori.id_kategori where menu.id_kategori='$kategori' order by id_menu asc ";}
          else {
            $sql=" select * from menu left join kategori on menu.id_kategori = kategori.id_kategori order by id_menu asc ";
          }
          $hasil=mysqli_query($kon,$sql);
          $no=0;
          while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_kategori"]; ?></td>
                <td><?php echo $data["nama_menu"]; ?></td>
                <td><?php echo $data["harga"]; ?></td>
                <td><?php echo $data["keterangan"]; ?></td>
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

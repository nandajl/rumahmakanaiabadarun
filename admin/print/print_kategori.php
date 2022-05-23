<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Kategori</h1>
</div>
<div class="container">

  <table class="table table-bordered table-hover">
    <br>
    <thead>
      <tr>
        <th>No</th>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
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
          </tr>
        </tbody>
        <?php
      }
      ?>
    </table>
  </div>
  <script type="text/javascript">
  	window.print();
  </script>

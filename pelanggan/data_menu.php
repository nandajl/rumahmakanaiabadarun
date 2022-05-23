
    <h1 class="h2">Data Menu</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <!-- <div class="btn-group me-2">
        <a href="index.php?p=print_menu">
          <button type="button" class="btn btn-sm btn-outline-secondary">Cetak</button>
        </a>
      </div> -->
    </div>
  </div>
    <div class="container">
      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
        <div class="form-group">
          <label for="sel1">Select list:</label>
          <select class="form-control" name="kategori">
            <?php
            include "../koneksi.php";
            //Perintah sql untuk menampilkan semua question data pada tabel kategori
            $sql="select * from kategori";
            $hasil=mysqli_query($kon,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
              $no++;
              $ket="";
              if (isset($_GET['kategori'])) {
                $kategori = trim($_GET['kategori']);
                if ($kategori==$data['id_kategori'])
                {
                  $ket="selected";
                }
              }
              ?>
              <option <?php echo $ket; ?> value="<?php echo $data['id_kategori'];?>"><?php echo
              $data['nama_kategori'];?></option><?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <input type="hidden" name="p" value="data_menu">
          <input type="submit" class="btn btn-info float-end my-2 " value="Pilih">
        </div>
      </form>
      <table class="table table-bordered table-hover">
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <!-- <th>Aksi</th> -->
          </tr>
        </thead>
        <?php
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
                <td><?php if($data['gambar']==null){ echo'<i>Tidak ada foto</i>';} else{ ?>
    							<img src="../admin/img/menu/<?= $data['gambar']; ?>" alt="gambar" width="80px"><?php } ?></td>
                <td><?php echo $data["keterangan"]; ?></td>
                <!-- <td>
                    <a href="index.php?p=edit_menu&id_menu=<?php echo $data["id_menu"] ?>"  class="btn btn-primary btn-sm">Ubah</a>  ||
                    <a href="hapus/hapus_menu.php?id_menu=<?php echo $data['id_menu'] ?>" onclick="return confirm('hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                  </td> -->
              </tr>
            </tbody>
            <?php
          }
          ?>
        </table>

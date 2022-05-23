<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data Menu</h1>
  </div>
    <div class="container">
      <form class="row g-3" action="" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
          <label for="sel1">Select list:</label>
          <div class="col-sm-10">
            <select class="form-control" name="kategori">
              <?php
              include "../koneksi.php";
              //Perintah sql untuk menampilkan semua question data pada tabel kategori
              $sql="select * from kategori";
              $hasil=mysqli_query($kon,$sql);
              $no=0;
              while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <option value="<?php echo $data['id_kategori'];?>">
                        <?php echo $data['nama_kategori'];?></option>
                        <?php
                }
                        ?>
              </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" name="nama_menu" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Harga</label>
          <div class="col-sm-10">
            <input type="text" name="harga" class="form-control">
          </div>
        </div>
        <div class="row mb-3">
          <label class="label-control">Keterangan</label>
          <div class="col-sm-10">
            <textarea name="keterangan" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label>Gambar</label><br>
          <input id="uploadImage" type="file" name="gambar" onchange="PreviewImage();" />
          <div class="form-group" id="photo-preview"></div>
          <p style="font-size:0.7em">Max. 2MB</p>
          <img id="uploadPreview" style="width:300px; " />
        </div>
        <div>
          <div class="row- col-2">
            <button type="submit" name="submit" class="btn btn-danger mb-3">Submit</button>
          </div>
        </div>
      <?php
      if (isset($_POST['submit'])){
        include '../koneksi.php';
        $id_menu = $_POST['id_menu'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $nama_menu = $_POST['nama_menu'];
        $keterangan = $_POST['keterangan'];
        $foto = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
        $fotobaru = $id_menu.$foto;
        // Set path folder tempat menyimpan fotonya
        $path = "img/menu/".$fotobaru;
        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
          // Proses simpan ke Database
          $q = mysqli_query($kon,"INSERT INTO menu VALUES(null,'$kategori','$nama_menu','$harga','$fotobaru','$keterangan') ");
          if ($q) {
                  echo "<script>alert('Data Berhasil DI Tambah')</script>";
                  echo "<script> location='index.php?p=data_menu'</script>";
          }
          else {
            echo "<script>alert('Gagal')</script>";
          }
        }
        else {
          echo "<script>alert('Gagal Upload Foto')</script>";
        }
      }
      ?>
      </form>
  </div>
</main>
<script type="text/javascript">
function PreviewImage() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};

</script>

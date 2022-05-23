<?php
include ("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

    <h1 class="h2">Data Pelanggan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <!-- <div class="btn-group me-2">

        <button type="button" class="btn btn-sm btn-outline-secondary">Cetak</button>
      </div> -->
    </div>
  </div>
    <div class="container">

      <table class="table table-bordered table-hover">
        <br>
        <thead>
          <tr>
            <th>No</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $no=1;
          $tampil=mysqli_query($kon,"SELECT * FROM pelanggan");
          while ($data=mysqli_fetch_array($tampil)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_pelanggan']; ?></td>
            <td><?php echo $data['nama_plgn']; ?></td>
            <td><?php echo $data['no_telp']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td>
              <a href="?p=pilih_pesan&id_pelanggan=<?php echo $data['id_pelanggan']; ?>" class="btn btn-success btn-sm">Pesan</a>
              <!-- <a href=?p=data_pelanggan&aksi=edit&id_pelanggan=<?php echo $data['id_pelanggan']; ?> class="btn btn-primary btn-sm">Ubah</a> |
              <a href="aksi/aksi_pelanggan.php?page=pelanggan&proses=hapus&id_pelanggan=<?php echo $data['id_pelanggan']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm">Hapus</a> -->
            </td>
          </tr>
          <?php
            $no++;
          }
          ?>
          </tbody>
        </table>
          <a href="?p=data_pelanggan&aksi=entri" class="btn btn-outline-dark float-end">Daftar</a>
        </div>
        <?php
          break;
          case 'entri' :
          ?>
              <h1 class="h2">Tambah Data Pelanggan</h1>
              <div class="btn-toolbar mb-2 mb-md-0">

              </div>
            </div>
        <div class="container">


          <form role="form" method="POST" action="aksi/aksi_pelanggan.php?page=pelanggan&proses=input">
          	<div class="form-group">
          		<label>Nama Pelanggan</label>
          		<input type="text" name="nama_plgn" class="form-control" >
          	</div>
          	<div class="form-group">
          		<label>No. Telp</label>
          		<input type="text" name="no_telp" class="form-control" placeholder="Telp">
          	</div>
          	<div class="form-group mb-3">
          		<label>Alamat</label>
          		<textarea name="alamat" class="form-control" rows="5"></textarea>
          	</div>

          	<button type="submit" class="btn btn-primary">Simpan</button>
          	<button type="reset" class="btn btn-danger">Reset</button>
          </form>
          <?php
          	break;

            case 'edit' :
            $ambil=mysqli_query($kon,"SELECT * FROM pelanggan WHERE id_pelanggan=$_GET[id_pelanggan]");
            $r=mysqli_fetch_array($ambil);

            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Pelanggan</h1>

              </div>
            <div class="container">


            <form role="form" method="POST" action="aksi/aksi_pelanggan.php?page=pelanggan&proses=update">
              <div class="form-group">
                <label>Nama Pelanggan</label>
								<input type="text" name="id_pelanggan" value="<?php echo $r['id_pelanggan'];?>" class="form-control" hidden>
                <input type="text" name="nama_plgn" value="<?php echo $r['nama_plgn'];?>" class="form-control" >
              </div>
              <div class="form-group">
                <label>No. Telp</label>
                <input type="text" name="no_telp" value="<?php echo $r['no_telp'];?>" class="form-control" placeholder="Telp">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="5"><?php echo $r['alamat'];?></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </form>
            <?php
            	break;
            }
            ?>

      </div>
    </div>

<?php
include ("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pembayaran Tempat</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
				<a href="index.php?p=print_laporan_pembayaran_tempat">
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
            <th>Nama Pelanggan</th>
            <th>Nama Menu</th>
            <th>Harga Jual</th>
            <th>Jumlah Pesan</th>
            <th>Harga Total</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $no=1;
          $tampil=mysqli_query($kon,"SELECT * FROM pembayaran_tempat, pesan_tempat, pelanggan, menu where pembayaran_tempat.id_pesan=pesan_tempat.id_pesan AND pesan_tempat.id_menu=menu.id_menu AND pesan_tempat.id_pelanggan=pelanggan.id_pelanggan");
          while ($data=mysqli_fetch_array($tampil)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_plgn']; ?></td>
            <td><?php echo $data['nama_menu']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['jumlah_pesan']; ?></td>
            <td><?php echo $data['harga_total']; ?></td>
            <td><?php echo $data['status_bayar']; ?></td>
            <td><a href="aksi/aksi_data_bayar_tempat.php?page=data_bayar_tempat&proses=hapus&id=<?php echo $data['id_bayar_tempat']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm">Hapus</a> |
              <a href="index.php?p=print_struck_tempat&id=<?php echo $data['id_bayar_tempat'];?>" class="btn btn-success btn-sm">Cetak</a></td>
          </tr>
          <?php
            $no++;
          }
          ?>
          </tbody>
        </table>
        </div>
        <?php
          break;
        }
          ?>
      </div>
    </div>
  </div>
</main>

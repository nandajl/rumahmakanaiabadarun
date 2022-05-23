<?php
include ("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>
<div class="row">
    <h1 class="h2">Data Pesan Online</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

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
            <th>Ongkos Kirim</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $no=1;
          $tampil=mysqli_query($kon,"SELECT * FROM pembayaran_online, pesan_online, pelanggan, menu where pembayaran_online.id_pesan=pesan_online.id_pesan AND pesan_online.id_menu=menu.id_menu AND pesan_online.id_pelanggan=pelanggan.id_pelanggan");
          while ($data=mysqli_fetch_array($tampil)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama_plgn']; ?></td>
            <td><?php echo $data['nama_menu']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['jumlah_pesan']; ?></td>
            <td><?php echo $data['ongkir']; ?></td>
            <td><?php echo $data['status_bayar']; ?></td>
            <td>
              <a href="index.php?p=print_struck_online&id=<?php echo $data['id_bayar_online'];?>" class="btn btn-success btn-sm">Cetak</a></td>

						</td>
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

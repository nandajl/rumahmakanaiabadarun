

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Pesanan Online</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

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
            <th>Ongkos Kirim</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../koneksi.php';
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
            </tr>
          <?php
            $no++;
          }
          ?>
          </tbody>
        </table>
        </div>
    <script type="text/javascript">
      window.print();

    </script>

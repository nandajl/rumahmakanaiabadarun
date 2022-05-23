<?php
  include '../koneksi.php';
  $ambil=mysqli_query($kon,"SELECT * FROM pembayaran_online JOIN pesan_online USING(id_pesan) join pelanggan using(id_pelanggan) JOIN menu USING(id_menu) WHERE id_bayar_online=$_GET[id]");
  $r=mysqli_fetch_array($ambil);
 ?>
 <div class="container">
<div class="row justify-content-center">
  <div class="col-6 ">
    <div class="my-3 border-bottom text-center ">
      <h2>STRUCK PESANAN</h2>
      <h4>Rumah Makan Aia Badarun</h4>
    </div>
    <div class="">
      <table class="table">
        <tr>
          <td>ID Transaksi</td>
          <td>:</td>
          <td><?php echo $r['id_bayar_online'];?></td>
        </tr>
        <tr>
          <td>Nama Pelanggan</td>
          <td>:</td>
          <td><?php echo $r['nama_plgn'];?></td>
        </tr>
        <tr>
          <td>Menu Pesanan</td>
          <td>:</td>
          <td><?php echo $r['nama_menu'];?></td>
        </tr>
        <tr>
          <td>Jumlah Pesan</td>
          <td>:</td>
          <td><?php echo $r['jumlah_pesan'];?></td>
        </tr>
        <tr>
          <td>Harga Menu</td>
          <td>:</td>
          <td><?php echo $r['harga'];?></td>
        </tr>
        <tr>
          <td>Ongkos Kirim</td>
          <td>:</td>
          <td><?php echo $r['ongkir'];?></td>
        </tr>
        <tr>
          <td>Harga Total</td>
          <td>:</td>
          <td><?php echo $r['harga_total'];?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td><?php echo $r['status_bayar'];?></td>
        </tr>
      </table>
    </div>
    <div class="float-end text-center">
      <p class="mb-5">Mengetahui</p>
      <p>Kasir</p>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
  window.print();
</script>

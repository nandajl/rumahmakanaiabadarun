<?php
include ("../koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='data_bayar_online' AND $proses=='hapus'){
  mysqli_query($kon,"DELETE FROM pembayaran_online WHERE id_bayar_online='$_GET[id]'");
  header('location:../index.php?p=data_bayar_online');
}
?>

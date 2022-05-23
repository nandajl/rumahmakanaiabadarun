<?php
include ("../koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='data_bayar_tempat' AND $proses=='hapus'){
  mysqli_query($kon,"DELETE FROM pembayaran_tempat WHERE id_bayar_tempat='$_GET[id]'");
  header('location:../index.php?p=data_bayar_tempat');
}
?>

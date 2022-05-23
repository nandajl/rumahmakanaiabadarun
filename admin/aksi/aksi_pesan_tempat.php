<?php
include ("../koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='pesan_tempat' AND $proses=='hapus'){

  mysqli_query($kon,"DELETE FROM pesan_tempat WHERE id_pesan='$_GET[id]'");
  header('location:../index.php?p=data_pelanggan');
}

?>

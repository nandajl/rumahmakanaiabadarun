<?php
include ("../koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='data_pesantempat' AND $proses=='hapus'){
  mysqli_query($kon,"DELETE FROM pesan_tempat WHERE id_pesan='$_GET[id]'");
  header('location:../index.php?p=data_pesantempat');
}

elseif ($page=='data_pesantempat' AND $proses=='update'){
    mysqli_query($kon,"UPDATE pesan_tempat SET id_pelanggan = '$_POST[id_pelanggan]', id_menu = '$_POST[id_menu]', jumlah_pesan = '$_POST[jumlah_pesan]' WHERE id_pesan = '$_POST[id_pesan]'");

  header('location:../index.php?p=data_pesantempat');
  }

?>

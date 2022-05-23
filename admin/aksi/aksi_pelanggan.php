<?php
include ("../koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='pelanggan' AND $proses=='hapus'){
  mysqli_query($kon,"DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'");
  header('location:../index.php?p=data_pelanggan');
}


elseif ($page=='pelanggan' AND $proses=='input'){
  mysqli_query($kon,"INSERT INTO pelanggan (id_pelanggan,nama_plgn,no_telp,alamat)
	                       VALUES(
                                null,'$_POST[nama_plgn]','$_POST[no_telp]','$_POST[alamat]')");
  header('location:../index.php?p=data_pelanggan');
  }

elseif ($page=='pelanggan' AND $proses=='update'){
    mysqli_query($kon,"UPDATE pelanggan SET nama_plgn ='$_POST[nama_plgn]', no_telp = '$_POST[no_telp]', alamat = '$_POST[alamat]' WHERE id_pelanggan = '$_POST[id_pelanggan]'");
    

  header('location:../index.php?p=data_pelanggan');
  }

?>

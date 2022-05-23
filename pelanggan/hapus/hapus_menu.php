<?php

  include '../../koneksi.php';
    $query = mysqli_query($kon, "DELETE FROM menu WHERE id_menu = '".$_GET['id_menu']."'");
    if($query){
        echo "<script>alert('Data Berhasil Di Hapus')</script>";
        echo "<script>location = '../index.php?p=data_menu'</script>";
    }else{
        echo "<script>alert('Data Gagal Di Hapus')</script>";
    }

?>

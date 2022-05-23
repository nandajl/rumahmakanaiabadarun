<?php

  include '../../koneksi.php';
    $query = mysqli_query($kon, "DELETE FROM kategori WHERE id_kategori = '".$_GET['id_kat']."'");
    if($query){
        echo "<script>alert('Data Berhasil Di Hapus')</script>";
        echo "<script>location = '../index.php?p=data_kat'</script>";
    }else{
        echo "<script>alert('Data Gagal Di Hapus')</script>";
    }

?>

<?php

  include '../../koneksi.php';
    $query = mysqli_query($kon, "DELETE FROM user WHERE id_user = '".$_GET['id_user']."'");
    if($query){
        echo "<script>alert('Data Berhasil Di Hapus')</script>";
        echo "<script>location = '../index.php?p=data_user'</script>";
    }else{
        echo "<script>alert('Data Gagal Di Hapus')</script>";
    }

?>

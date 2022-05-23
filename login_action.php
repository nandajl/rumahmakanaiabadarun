<?php
session_destroy();
session_start();

include "koneksi.php";

  $username = ($_POST['username']);
  $password = (md5($_POST['password']));

    $query = mysqli_query($kon, "SELECT * from user where username = '".$username."' and password='".$password."' limit 1");

    $cek = mysqli_num_rows($query);
    $line = mysqli_fetch_array($query);

    if ($cek) {
        if ($line['id_akses'] == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['data'] = $line;
            echo "<script> alert('Anda Login Sebagai Admin')</script>";
            echo "<script> location='admin/index.php'; </script>";
        } else if ($line['id_akses'] == 2) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['data'] = $line;
            header("Location:pelanggan/index.php");
            // echo "<script> location='pelanggan/index.php'; </script>";
        } else {
            echo "<script>alert('Anda gagal Login')</script>";
        }
    }
    else {
        echo "<script>alert('Anda gagal Login')</script>";
        echo "<script> location='index.php'</script>";

      }
 ?>

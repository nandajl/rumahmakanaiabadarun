

<?php
    include'koneksi.php';

        $password = md5($_POST['password']);
        $query = mysqli_query($kon, "INSERT INTO user VALUES(NULL,2,'".$_POST['username']."','".$_POST['email']."','".$password."' )");

        if($query){
            echo "<script>alert('Berhasil Registrasi')</script>";
            echo "<script>location = 'index.php'</script>";
        }else{
            echo "<script>alert('Gagal Registrasi')</script>";

        }
    ?>

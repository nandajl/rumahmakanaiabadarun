
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-5">
  <?php
  if (!isset($_SESSION["username"])) {
    echo "<script> alert('Anda harus login terlebih dahulu')</script>";
    echo "<script> location='../login.php'</script>";
  }

  $username=$_SESSION["username"];

   ?>
      <div class="container">
       <div class="jumbotron text-center">
         <h1>Selamat Datang di halaman Administrasi</h1>
         <h4>halaman ini hanya dapat diakses oleh admin</h4>
          <p>Username : <?php echo $username; ?></p>
       </div>
</main>

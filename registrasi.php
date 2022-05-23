<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  body{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/restoran_padang.png);
    background-repeat: no-repeat;
  }


  </style>


  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

  <main class="form-signin bg-light rounded-3">
    <form action="registrasi_action.php" method="post">
      <img class="mb-2" src="img/restoran.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-bold">Rumah Makan Aia Badarun</h1>
      <div class="form-floating mb-1">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating mb-1">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-4">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-outline-primary mb-1" type="submit" name="tambah">Registrasi</button>

      <p class="mt-4  mb-3 text-muted">&copy; Nanda JL 2021</p>
    </form>
  </main>



</body>
</html>

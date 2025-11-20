<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $mail = $_POST["email"];
  $pass = $_POST["password"];
  if ($mail == "admin@admin" && $pass == "password") {
    header("Location: admin.php"); //Redirige en PHP
    exit();
  } else {
    // FIXME : fonctionne pas (surement parce que je lui ai pas dit ou l'écrire)
    echo "mdp incorrect";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
  <div class="container-fluid ">
    <a class="navbar-brand orange gras josefin color-principal" href="index.html">Voyage-Voyage</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link fw-bold black margin10 josefin color-principal" href="#index.html">DESTINATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold black margin10 josefin color-principal" href="#">CIRCUIT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold black margin10 josefin color-principal" href="login.php">PROFIL</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body class="login-img">
  <div class="container images ">
    <div class="row justify-content-center center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Sign In</h3>
            <!-- pas oublier le form pour le php -->
            <form method="POST" action="">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <!-- name="email" et password pour le php -->
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>
</body>

</html>
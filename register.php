<?php
include("db/connect.php");
session_start();
if (isset($_SESSION['login'])) {
  header('Location: dashboard.php');
  exit();
}

if (isset($_POST["register"])) {
  $name = strtolower(stripslashes($_POST["name"]));
  $email = $_POST["email"];
  $noHp = $_POST["noHp"];
  $password = mysqli_real_escape_string($con, $_POST["pass"]);
  $password2 = mysqli_real_escape_string($con, $_POST["konfirPass"]);
  $groupID = 3;

  $sqlUser = "SELECT username FROM users WHERE username='$noHp'";
  $resultUser = mysqli_query($con, $sqlUser);
  if ($resultUser->num_rows > 0) {
    // Username sudah terdaftar
    echo "<script>alert('Username sudah terdaftar');</script>";
  } elseif ($password !== $password2) {
    // Password dan konfirmasi password tidak sesuai
    echo "<script>alert('Password dan konfirmasi password tidak sesuai');</script>";
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, phone_number, username, password, group_id) VALUES ('$name', '$email', '$noHp', '$noHp', '$password', '$groupID')";
    if ($con->query($sql) === TRUE) {
      echo '<script>alert("Registrasi berhasil"); window.location.href = "login.php";</script>';
    } else {
      die(mysqli_error($con));
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ryandi | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Ryandi</b> | Registration</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Silahkan Register</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Nama" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="noHp" placeholder="Nomor Telepon" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="bi bi-telephone-fill"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pass" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="konfirPass" placeholder="Konfirmasi password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>

        <a href="login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
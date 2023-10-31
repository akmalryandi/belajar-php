<?php
include("db/connect.php");
session_start();
if (isset($_SESSION['login'])) {
  header('Location: dashboard.php');
  exit();
}

if( isset($_POST["submit"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($con, "SELECT * FROM users where username = '$username'");

  //cek username
  if(mysqli_num_rows($result) === 1 ){

    //cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"]) ){
      $_SESSION['login'] = $username;
      echo '<script>alert("Login berhasil"); window.location.href = "dashboard.php";</script>';
      exit;
    }
  }

  $error = true;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ryandi | Log in</title>

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

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Ryandi</b> | Log In</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login untuk melanjutkan</p>


        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Username" name="username" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="bi bi-telephone-fill"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <?php if(isset($error)) : ?>
            <p class="login-box-msg" style="color:red">Username dan Password Tidak Sesuai !!!</p>
          <?php endif; ?>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="#">Lupa Password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
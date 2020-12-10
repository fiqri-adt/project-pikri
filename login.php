<?php session_start();
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
		header('Location: dashboard_karyawan.php');
	}elseif($_SESSION['level'] == 'asmen'){
		header('Location: dashboard_u.php');
	} else {
		header('Location: login.php');
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Login Page</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="img" style="margin-top: 100px;">
            <img src="./img/login.svg" style="width: auto; height: 370px;">
          </div>
        </div>
        <div class="col-lg-6" style="margin-top: 60px;">
          <h2 class="text-center" style="font-weight: 600;">LOGIN FORM</h2><br>
          <form class="form-signin" action="cek_login.php" method="post">
            <label>Email address</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus><br>
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" style="background-color: #6C63FF" type="submit">Masuk</button>
            <br>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- Bootraps Min JS -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- Jquery -->
    <script src="./js/jquery.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php 
    if(@$_SESSION['msg']==1){
      echo '<script>
      $(document).ready(function() {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Username & Password Salah !",
        })
      })
      </script>';
      $_SESSION['msg'] = 0;
    }
    ?>
  </body>
</html>

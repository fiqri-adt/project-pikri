<?php 
  session_start();
  include '../../koneksi.php';

  // $result = $mysqli->query("SELECT * FROM `user` WHERE `id_user` = ".$_GET['id_user']."");
  $result = $mysqli->query("
    SELECT * FROM user INNER JOIN denom_kertas on user.id_user = denom_kertas.id_users INNER JOIN denom_koin on user.id_user = denom_kertas.id_users WHERE NOT user.level = 'manager' AND id_user = $_GET[id_user]
    ");

  if($result->num_rows > 0){
     $data = mysqli_fetch_object($result);
  }else{
     echo "data tidak tersedia";
     die();
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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  
    <!-- DATA TABLES -->
    <link href="../../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Genta ESP Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo "Hello, ".ucwords($_SESSION['user']);?></a></li>
            <li><a href="../../logout.php">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <!-- <h1 class="page-header text-center">Dashboard Edit Denom Kertas</h1> -->
          <div class="jumbotron">
            <h2 class="text-center" style="font-family: raleway sans-serif; font-weight: 600;">Dashboard Edit Denom Kertas</h2>
          </div>
          <form action="func_edit_user.php?id_user=<?=$data->id_user?>" method="POST">
            <div class="row">
              <div class="col-lg-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="user" class="form-control" value="<?= $data->user ?>">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="pass" class="form-control" value="<?= $data->pass ?>">
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select name="level" class="form-control">
                        <option value="<?= $data->level ?>">Manager</option>
                        <option value="manager">Manager</option>
                        <option value="asmen">Asmen</option>
                        <option value="karyawan">Karyawan</option>
                      </select>
                    </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>RP 1</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp1 ?>">
                  </div>
                  <div class="form-group">
                    <label>RP 3</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp3 ?>">
                  </div>
                  <div class="form-group">
                    <label>RP 5</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp5 ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>RP 2</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp2 ?>">
                  </div>
                  <div class="form-group">
                    <label>RP 4</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp4 ?>">
                  </div>
                  <div class="form-group">
                    <label>RP 6</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->rp6 ?>">
                  </div>
                  <div class="form-group">
                    <label>inpak</label>
                     <input type="text" name="pass" class="form-control" value="<?= $data->inpak ?>">
                  </div>
                </div>
                </div>
              </div>
              <div>
                  <button type="submit" class="btn btn-success btn-sm">Update changes</button>
              </div>
            </form>
          </div>
          <br>
         </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  <!-- DATA TABES SCRIPT -->
    <script src="../../js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="../../js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../js/holder.min.js"></script>>
  </body>
</html>
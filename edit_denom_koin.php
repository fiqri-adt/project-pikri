<?php 
	
	session_start();
	include 'koneksi.php';

	if ($_POST) {
    
		date_default_timezone_set("Asia/Bangkok");
		$result = $mysqli->query("UPDATE denom_koin SET id_denom_koin='".$_POST['id_denom_koin']."', rp1='".$_POST['rp1']."', rp2='".$_POST['rp2']."', rp3='".$_POST['rp3']."', rp4='".$_POST['rp4']."', rp5='".$_POST['rp5']."', rp6='".$_POST['rp6']."', updated_at='".date('Y-m-d H:s:i')."' WHERE id_denom_koin=".$_POST['id_denom_koin']);

		if(!$result){
			echo $mysqli->connect_errno." - ".$mysqli->connect_error;
			exit();

		}else{

			echo "<script>
           alert('Data berhasil di update');
           window.location.href='dashboard_u.php';
           </script>";
		}

	}else{

		$result = $mysqli->query("SELECT * FROM `denom_koin` WHERE `id_denom_koin` = ".$_GET['id_denom_koin']."");

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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  
  <!-- DATA TABLES -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <li><a href="logout.php">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <?php if($_SESSION['level']=='admin'){?>
             
            <li class="active"><a href="">Master Data Denom</a></li>
            <li><a href="">Keuangan</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Denom Koin</h1>
          <div class="row">
            <div class="col-lg-12">
                <!-- <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="font-weight: bold;">Tambah</button> -->
            </div> 
          </div>
            <form action="" method="POST">
	          <div class="row">
	            <div class="col-lg-12">
	              	<div class="form-group">
	              		<input class="form-control" type="hidden" name="id_denom_koin" value="<?= $data->id_denom_koin ?>">
	              		<label>Rp 1</label>
	              		<input class="form-control" type="number" name="rp1" value="<?= $data->rp1 ?>">
	              	</div>
                  <div class="form-group">
                    <label>Rp 2</label>
                    <input class="form-control" type="number" name="rp2" value="<?= $data->rp2 ?>">
                  </div>
                  <div class="form-group">
                    <label>Rp 3</label>
                    <input class="form-control" type="number" name="rp3" value="<?= $data->rp3 ?>">
                  </div>
                  <div class="form-group">
                    <label>Rp 4</label>
                    <input class="form-control" type="number" name="rp4" value="<?= $data->rp4 ?>">
                  </div>
                  <div class="form-group">
                    <label>Rp 5</label>
                    <input class="form-control" type="number" name="rp5" value="<?= $data->rp5 ?>">
                  </div>
                  <div class="form-group">
                    <label>Rp 6</label>
                    <input class="form-control" type="number" name="rp6" value="<?= $data->rp6 ?>">
                  </div>
	              	<div class="float-right">
	              		<button class="btn btn-sm btn-success">Update</button>
	              	</div>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>
<?php
}
?>
<?php 
    include '../../koneksi.php';  // include = menambahkan/mengikutkan file, setting koneksi ke database
    session_start();
    if($_SESSION['login'] !== 'login') header('Location: login.php');
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
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
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
                <a class="navbar-brand" href="#">Asisten Manager</a>
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
                    <?php if($_SESSION['level']=='asmen'){?>
                    <li class=""><a href="../../dashboard_u.php">Master Data Denom</a></li>
                    <li class="active"><a href="">Pengeluaran</a></li>
                    <li class=""><a href="../users/v_index.php">Mangement Users</a></li>
                    <li><a href="../profile/v_index.php">Porfile</a></li>
                    <li><a href="../../logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">Dashboard <?php echo ucfirst($_SESSION['level']);?></h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h2 class="text-center">Dashboard Pengeluaran</h2>
                        </div>
                        <table id="denomKertas" class="table table-bordered table-striped dataTable">
                            <thead>
                                <tr role="row">
                                    <th>NO</th>
                                    <th>Denom Kertas</th>
                                    <th>RP1</th>
                                    <th>RP2</th>
                                    <th>RP3</th>
                                    <th>RP4</th>
                                    <th>RP5</th>
                                    <th>RP6</th>
                                    <th>Inpak</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr role="row">
                                    <th></th>
                                    <th>Pengeluran</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="denom_kertas_process/process_denom_kertas.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Denom</label>
                                    <input type="number" name="denom_kertas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp1</label>
                                    <input type="number" name="rp1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp3</label>
                                    <input type="number" name="rp3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp5</label>
                                    <input type="number" name="rp5" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Inpak</label>
                                    <input type="number" name="inpak" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp2</label>
                                    <input type="number" name="rp2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp4</label>
                                    <input type="number" name="rp4" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Rp6</label>
                                    <input type="number" name="rp6" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable();
            $('#denomKoin').DataTable();
        });
         $('#myTab').on('click', function(e) {
             e.preventDefault();
             if (isValid()) {
                alert('bener valid')
               $(this).tab('show');
             }
           });
        
           function isValid() {
             const text = $("#homeText").val();
             console.log(text)
             if (text.length === 0) {
                alert('false')
               return false;
             }
              alert('true')
             return true;
           }
   </script>
</body>
</html>
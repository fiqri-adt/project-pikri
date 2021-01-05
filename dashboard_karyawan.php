<?php 
    include 'koneksi.php';   // include = menambahkan/mengikutkan file, setting koneksi ke database
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- DATA TABLES -->
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                <a class="navbar-brand" href="#">Karyawan</a>
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
                    <?php if($_SESSION['level']=='karyawan'){?>
                    <li class="active"><a href="">Master Data Denom</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="page-header">Dashboard <?php echo ucfirst($_SESSION['level']);?></h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="button">
                            <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalKertas" style="font-weight: bold;">Tambah Denom Kertas</button>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="button">
                            <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modalKoin" style="font-weight: bold;">Tambah Denom Koin</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="exTab1">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#1a" data-toggle="tab">Denom Kertas</a>
                                </li>
                                <li>
                                    <a href="#2a" data-toggle="tab">Denom Koin</a>
                                </li>
                            </ul>
                            <br/>
                            <div class="tab-content clearfix">
                                <div class="tab-pane active table-responsive" id="1a">
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
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $results = $mysqli->query("SELECT * FROM denom_kertas");
                                        if ($results->num_rows > 0) {
                                            $no = 1;
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $row['denom_kertas'] ?></td>
                                                <td><?= $row['rp1'] ?></td>
                                                <td><?= $row['rp2'] ?></td>
                                                <td><?= $row['rp3'] ?></td>
                                                <td><?= $row['rp4'] ?></td>
                                                <td><?= $row['rp5'] ?></td>
                                                <td><?= $row['rp6'] ?></td>
                                                <td><?= $row['inpak'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td>
                                                <?php
                                                $total_satu_baris = $mysqli->query("SELECT SUM(rp1)+SUM(rp2)+SUM(rp3)+SUM(rp4)+SUM(rp5)+SUM(rp6) as Total FROM denom_kertas WHERE id_denom_kertas= '".$row['id_denom_kertas']."'");
                                                $data_total_satu_baris = $total_satu_baris->fetch_assoc();
                                                foreach ($data_total_satu_baris as $key => $value) {
                                                    echo $value; 
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="denom_kertas_process/process_delete_kertas.php?id_denom_kertas=<?= $row['id_denom_kertas']?>">Delete</a>
                                                    <a class="btn btn-sm btn-warning" href="edit_denom_kertas.php?id_denom_kertas=<?= $row['id_denom_kertas']?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr role="row">
                                                <th></th>
                                                <th>Jumlah</th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp1 = $mysqli->query("SELECT SUM(denom_kertas * rp1) AS JumlahRp1 FROM denom_kertas");
                                                        $resultKertas1 = $jumlah_per_rp1->fetch_assoc();
                                                        print_r($resultKertas1['JumlahRp1']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp2 = $mysqli->query("SELECT SUM(denom_kertas * rp2) AS JumlahRp2 FROM denom_kertas");
                                                        $resultKertas2 = $jumlah_per_rp2->fetch_assoc();
                                                        print_r($resultKertas2['JumlahRp2']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp3 = $mysqli->query("SELECT SUM(denom_kertas * rp3) AS JumlahRp3 FROM denom_kertas");
                                                        $resultKertas3 = $jumlah_per_rp3->fetch_assoc();
                                                        print_r($resultKertas3['JumlahRp3']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp4 = $mysqli->query("SELECT SUM(denom_kertas * rp4) AS JumlahRp4 FROM denom_kertas");
                                                        $resultKertas4 = $jumlah_per_rp4->fetch_assoc();
                                                        print_r($resultKertas4['JumlahRp4']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp5 = $mysqli->query("SELECT SUM(denom_kertas * rp5) AS JumlahRp5 FROM denom_kertas");
                                                        $resultKertas5 = $jumlah_per_rp5->fetch_assoc();
                                                        print_r($resultKertas5['JumlahRp5']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $jumlah_per_rp6 = $mysqli->query("SELECT SUM(denom_kertas * rp6) AS JumlahRp6 FROM denom_kertas");
                                                        $resultKertas6 = $jumlah_per_rp6->fetch_assoc();
                                                        print_r($resultKertas6['JumlahRp6']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $inpak = $mysqli->query("SELECT SUM(denom_kertas * inpak) AS Inpak FROM denom_kertas");
                                                        $resultInpakKertas = $inpak->fetch_assoc();
                                                        print_r($resultInpakKertas['Inpak']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $total_denom_kertas = $mysqli->query("SELECT SUM(denom_kertas * rp1)+SUM(denom_kertas * rp2)+SUM(denom_kertas * rp3)+SUM(denom_kertas * rp4)+SUM(denom_kertas * rp5)+SUM(denom_kertas * rp6) AS Total FROM denom_kertas");
                                                        $result_kertas = $total_denom_kertas->fetch_assoc();
                                                        print_r($result_kertas['Total']);
                                                        ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive" id="2a">
                                    <table id="denomKoin" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>NO</th>
                                                <th>Denom Koin</th>
                                                <th>RP1</th>
                                                <th>RP2</th>
                                                <th>RP3</th>
                                                <th>RP4</th>
                                                <th>RP5</th>
                                                <th>RP6</th>
                                                <th>Inpak</th>
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $results = $mysqli->query("SELECT * FROM denom_koin");
                                        if ($results->num_rows > 0) {
                                            $no = 1;
                                            while ($row = $results->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $row['denom_koin'] ?></td>
                                                <td><?= $row['rp1'] ?></td>
                                                <td><?= $row['rp2'] ?></td>
                                                <td><?= $row['rp3'] ?></td>
                                                <td><?= $row['rp4'] ?></td>
                                                <td><?= $row['rp5'] ?></td>
                                                <td><?= $row['rp6'] ?></td>
                                                <td><?= $row['inpak'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td>
                                                <?php
                                                $total_satu_baris = $mysqli->query("SELECT SUM(rp1)+SUM(rp2)+SUM(rp3)+SUM(rp4)+SUM(rp5)+SUM(rp6) as Total FROM denom_koin WHERE id_denom_koin= '".$row['id_denom_koin']."'");
                                                $data_total_satu_baris = $total_satu_baris->fetch_assoc();
                                                foreach ($data_total_satu_baris as $key => $value) {
                                                    echo $value; 
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="denom_koin_process/process_delete_koin.php?id_denom_koin=<?= $row['id_denom_koin']?>">Delete</a>
                                                    <a class="btn btn-sm btn-warning" href="edit_denom_koin.php?id_denom_koin=<?= $row['id_denom_koin']?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Jumlah</th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_1 = $mysqli->query("SELECT SUM(denom_koin * rp1) AS JumlahRp1 FROM denom_koin");
                                                        $resultkoin1 = $denom_koin_1->fetch_assoc();
                                                        print_r($resultkoin1['JumlahRp1']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_2 = $mysqli->query("SELECT SUM(denom_koin * rp2) AS JumlahRp2 FROM denom_koin");
                                                        $resultKoin2 = $denom_koin_2->fetch_assoc();
                                                        print_r($resultKoin2['JumlahRp2']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_3 = $mysqli->query("SELECT SUM(denom_koin * rp3) AS JumlahRp3 FROM denom_koin");
                                                        $resultKoin3 = $denom_koin_3->fetch_assoc();
                                                        print_r($resultKoin3['JumlahRp3']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_4 = $mysqli->query("SELECT SUM(denom_koin * rp4) AS JumlahRp4 FROM denom_koin");
                                                        $resultKoin4 = $denom_koin_4->fetch_assoc();
                                                        print_r($resultKoin4['JumlahRp4']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_5 = $mysqli->query("SELECT SUM(denom_koin * rp5) AS JumlahRp5 FROM denom_koin");
                                                        $resultKoin5 = $denom_koin_5->fetch_assoc();
                                                        print_r($resultKoin5['JumlahRp5']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $denom_koin_6 = $mysqli->query("SELECT SUM(denom_koin * rp6) AS JumlahRp6 FROM denom_koin");
                                                        $resultKoin6 = $denom_koin_6->fetch_assoc();
                                                        print_r($resultKoin6['JumlahRp6']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $inpak = $mysqli->query("SELECT SUM(denom_koin * inpak) AS Inpak FROM denom_koin");
                                                        $resultInpakKoin = $inpak->fetch_assoc();
                                                        print_r($resultInpakKoin['Inpak']);
                                                        ?>
                                                </th>
                                                <th>
                                                    <?php 
                                                        $total_denom_koin = $mysqli->query("SELECT SUM(denom_koin * rp1)+SUM(denom_koin * rp2)+SUM(denom_koin * rp3)+SUM(denom_koin * rp4)+SUM(denom_koin * rp5)+SUM(denom_koin * rp6) AS Total FROM denom_koin");
                                                        $result_koin = $total_denom_koin->fetch_assoc();
                                                        print_r($result_koin['Total']);
                                                        ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- Modal Add -->
    <div class="modal fade" id="modalKertas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Denom Kertas</h5>
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

     <!-- Modal Add -->
    <div class="modal fade" id="modalKoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Denom Koin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="denom_koin_process/process_add_koin.php" method="POST">
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#denomKertas').DataTable();
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
    <script type="text/javascript">
        $(document).on('click', '#id_denom', function() {
          var id_denom_kertas = $(this).data('id_denom_kertas');
          var denom_kertas = $(this).data('denom_kertas');
          var inpak = $(this).data('inpak');
          var rp1 = $(this).data('rp1');
          var rp2 = $(this).data('rp2');
          var rp3 = $(this).data('rp3');
          var rp4 = $(this).data('rp4');
          var rp5 = $(this).data('rp5');
          var rp6 = $(this).data('rp6');
        
          $('#id_denom_kertas').val(id_denom_kertas);
          $('#denom_kertas').val(denom_kertas)
          $('#inpak').val(inpak)
          $('#rp1').val(rp1)
          $('#rp2').val(rp2)
          $('#rp3').val(rp3)
          $('#rp4').val(rp4)
          $('#rp5').val(rp5)
          $('#rp6').val(rp6)
        
          $('#modal_edit').modal('show');
        });
        
        $('#update_data').on('click', function(e) {
          e.preventDefault();
          var form_data = {
            id_denom_kertas: $('#id_denom_kertas').val(),
            denom_kertas: $('#denom_kertas').val(),
            rp1: $('#rp1').val(),
            rp2: $('#rp2').val(),
            rp3: $('#rp3').val(),
            rp4: $('#rp4').val(),
            rp5: $('#rp5').val(),
            rp6: $('#rp6').val(),
            inpak: $('#inpak').val(),
          }
          var type = "POST";
          var id_denom_kertas = $('#id_denom_kertas').val();
          var dataType = 'JSON';
        
        })
        </script>
</body>
</html>
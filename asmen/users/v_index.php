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
                    <li><a href="../../logout.php">Logout</a></li>
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
                    <li class=""><a href="../pengeluaran/v_index.php">Pengeluaran</a></li>
                    <li class="active"><a href="v_index.php">Management Users</a></li>
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
                            <h2 class="text-center">Dashboard Mangement Users</h2>
                        </div>
                        <div style="text-align: right;">
                            <button class="btn btn-xl btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                        </div><br>
                        <table class="table table-bordered dataTable">
                            <thead>
                                <tr role="row">
                                    <th>NO</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Denom Kertas</th>
                                    <th>Denom Koin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $results = $mysqli->query("
                                    SELECT DISTINCT user.*, denom_kertas.*, denom_koin.* FROM user 
                                    INNER JOIN denom_kertas on user.id_user = denom_kertas.id_users 
                                    INNER JOIN denom_koin on user.id_user = denom_koin.id_users 
                                    WHERE NOT user.level = 'manager'
                                    ORDER BY user.id_user
                                ");

                                if ($results->num_rows > 0) {
                                    
                                    $no =1;
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?=$row['user'] ?></td>
                                            <td><?=$row['level'] ?></td>
                                            <td><?=$row['denom_kertas'] ?></td>
                                            <td><?=$row['denom_koin'] ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="v_edit.php?id_user=<?= $row['id_user']?>">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="func_del_user.php?id_user=<?=$row["id_user"]?>">Delete</a>
                                                <button id="detail_content" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail"
                                                data-id_user="<?= $row['id_user'] ?>">
                                                Detail Kertas</button>
                                                  <button id="detail_content" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail"
                                                data-id_user="<?= $row['id_user'] ?>">
                                                Detail Koin</button>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                }
                                ?>
                            </tbody>
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
                    <form action="func_add_user.php" method="POST">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="user" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" name="pass" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Level</label>
                              <select name="level" class="form-control">
                                <option value="manager">Manager</option>
                                <option value="asmen">Asmen</option>
                                <option value="karyawan">Karyawan</option>
                              </select>
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

    <!-- Modal Detail -->
     <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="hidden" name="id_user" class="form-control" id="id_user">
                                  <input type="text" name="user" class="form-control" id="user">
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="container">
                                <h2>Donom Kertas</h2>
                            </div>
                            <div class="col-lg-6">
                             <div class="form-group">
                                <label>Denom Kertas</label>
                                 <input type="text" name="pass" class="form-control" id="denom_kertas">
                              </div>
                              <div class="form-group">
                                <label>RP 1</label>
                                 <input type="text" name="pass" class="form-control" id="rp1">
                              </div>
                              <div class="form-group">
                                <label>RP 3</label>
                                 <input type="text" name="pass" class="form-control" id="rp2">
                              </div>
                              <div class="form-group">
                                <label>RP 5</label>
                                 <input type="text" name="pass" class="form-control" id="rp3">
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>RP 2</label>
                                 <input type="text" name="pass" class="form-control" id="rp4">
                              </div>
                              <div class="form-group">
                                <label>RP 4</label>
                                 <input type="text" name="pass" class="form-control" id="rp5">
                              </div>
                              <div class="form-group">
                                <label>RP 6</label>
                                 <input type="text" name="pass" class="form-control" id="rp6">
                              </div>
                              <div class="form-group">
                                <label>inpak</label>
                                 <input type="text" name="pass" class="form-control" id="inpak">
                              </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-sm">Update changes</button>
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

    <script>
        var base_url = 'http://localhost/project-pikri/'
        $(document).ready(function() {
            $('.dataTable').DataTable();
        })
        $(function() {
            $(document).on('click', '#detail_content', function(e) {
                e.preventDefault()
                var id_user = $(this).data('id_user')
                $.ajax({
                    url: base_url + 'asmen/users/func_edit_user.php?id_user=' + id_user  + '&denom_kertas=denom_kertas',
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(result){
                        console.log(result);
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
                console.log(id_user);
            })
        })
    </script>
</body>
</html>
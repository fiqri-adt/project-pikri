<?php 

session_start();
include '../../koneksi.php';
include '../../module/Lib.php';

$lib = new Lib;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {
	$data = [];
	foreach ($_POST as $key => $value) {
		$data += [$key => $_POST[$key]];
	}
	$hasil = array(
		'user' => $data['user'], 
		'pass' => $data['pass'], 
		'level' => $data['level'], 
		'last_login' => date('Y-m-d H:s:i')
	);
	$where = array(
	    'id_user' => $_GET['id_user']
	);

	$lib->update('user', $hasil, $where);
	print_r('berhasil');

}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id_user']) {

	/* Jika Denom Kertas */
	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['denom_kertas'])) {
		$result = $mysqli->query("
	    SELECT DISTINCT denom_kertas.*, user.* FROM user 
		INNER JOIN $_GET[denom_kertas] on user.id_user = $_GET[denom_kertas].id_users 
		WHERE NOT user.level = 'manager' AND id_user = $_GET[id_user]
	    ");

		if($result->num_rows > 0){
		    $data = mysqli_fetch_object($result);
		    echo json_encode($data);
		}else{
		    echo "data tidak tersedia";
		    die();
		}
	}else{

		/* Jika Denom Koin */
		if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['denom_koin'])) {
			$result = $mysqli->query("
		    SELECT DISTINCT denom_koin.*, user.* FROM user 
			INNER JOIN $_GET[denom_koin] on user.id_user = $_GET[denom_koin].id_users 
			WHERE NOT user.level = 'manager' AND id_user = $_GET[id_user]
		    ");

			if($result->num_rows > 0){
			    $data = mysqli_fetch_object($result);
			    echo json_encode($data);
			}else{
			    echo "data tidak tersedia";
			    die();
			}
		}
	}
}

?>
<?php 

session_start();
include '../../koneksi.php';
include '../../module/Lib.php';

$lib = new Lib;

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

?>
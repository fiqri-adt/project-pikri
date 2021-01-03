<?php 

session_start();
include '../../koneksi.php';
include '../../module/Lib.php';

$lib = new Lib;

$data = array(
	'user' => $lib->post('user'), 
	'pass' => $lib->post('pass'), 
	'level' => $lib->post('level'), 
	'last_login' => date('Y-m-d H:s:i'), 
);

$lib->insert('user', $data);

print_r('berhasil');
?>
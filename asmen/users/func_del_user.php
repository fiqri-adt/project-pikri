<?php 

session_start();
include '../../koneksi.php';
include '../../module/Lib.php';

// $lib = new Lib;

$result = $mysqli->query("DELETE FROM `user` WHERE `user`.`id_user` = ".$_GET['id_user']."");
if(!$result){
	echo $mysqli->connect_errno." - ".$mysqli->connect_error;
	exit();
}
else{
	echo "<script>
       alert('Data berhasil di hapus');
       window.location.href='v_index.php';
       </script>";
}

print_r('berhasil');
?>
<?php 
	
	session_start();
	include '../koneksi.php';
	$result = $mysqli->query("DELETE FROM `denom_kertas` WHERE `denom_kertas`.`id_denom_kertas` = ".$_GET['id_denom_kertas']."");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		// print_r($_GET); die();
		echo "<script>
       alert('Data berhasil di hapus');
       window.location.href='../dashboard_karyawan.php';
       </script>";
	}

?>
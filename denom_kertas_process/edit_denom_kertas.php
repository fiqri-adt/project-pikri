<?php 
	
	session_start();
	include '../koneksi.php';
	$result = $mysqli->query("SELECT * FROM `denom_kertas` WHERE `id_denom_kertas` = ".$_GET['id_denom_kertas']."");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		// echo base_url('denom_kertas.php');
		print_r($result->fetch_assoc());
		// echo "<script>window.location = 'denom_kertas.php'</script>";
	}

?>
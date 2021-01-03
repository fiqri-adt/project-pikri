<?php 
	
	session_start();
	include '../koneksi.php';
	$result = $mysqli->query("DELETE FROM `denom_koin` WHERE `denom_koin`.`id_denom_koin` = ".$_GET['id_denom_koin']."");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		echo "<script>
	       alert('Data berhasil di hapus');
	       window.location.href='../denom_kertas.php';
	       </script>";
	}

?>
<?php 
	session_start();
	include "../koneksi.php"

	$denom_koin = $_POST['denom_koin'];
	$rp1 = $_POST['rp1'];
	$rp2 = $_POST['rp2'];
	$rp3 = $_POST['rp3'];
	$rp4 = $_POST['rp4'];
	$rp5 = $_POST['rp5'];
	$rp6 = $_POST['rp6'];
	$inpak = $_POST['inpak'];
	
	$result = $mysqli->query("UPDATE `denom_koin` SET 
		`denom_koin` = '".$denom_koin."', `rp1` = '".$rp1."', `rp2` = '".$rp2."', `rp3` = '".$rp3."', `inpak` = '".$inpak."' WHERE `id_denom_koin` = ".$_GET['id'].";");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		// echo base_url('denom_kertas.php');
		print_r('berhasil');
		// echo "<script>window.location = 'denom_kertas.php'</script>";
	}
?>
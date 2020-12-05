<?php
	session_start();
	include '../koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database
	date_default_timezone_set("Asia/Bangkok"); // timezona Asia Bangkok
	$denom_kertas = $_POST['denom_kertas'];
	$rp1 = $_POST['rp1'];
	$rp2 = $_POST['rp2'];
	$rp3 = $_POST['rp3'];
	$rp4 = $_POST['rp4'];
	$rp5 = $_POST['rp5'];
	$rp6 = $_POST['rp6'];
	$inpak = $_POST['inpak'];
	$created_at = date('Y-m-d H:s:i');
	$updated_at = date('Y-m-d H:s:i');
	
	$result = $mysqli->query("INSERT INTO denom_kertas ( denom_kertas, rp1, rp2, rp3, rp4, rp5, rp6, inpak, created_at, updated_at) VALUES ('$denom_kertas','$rp1','$rp2','$rp3','$rp4','$rp5','$rp6','$inpak', '$created_at', '$updated_at')");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		echo "<script>
       alert('Data berhasil di tambahkan');
       window.location.href='../denom_kertas.php';
       </script>";
	}
?>
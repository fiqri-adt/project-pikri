<?php
	session_start();
	include '../koneksi.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database
	date_default_timezone_set("Asia/Bangkok"); // timezona Asia Bangkok
	
	$denom_koin = $_POST['denom_koin'];
	$rp1 = $_POST['rp1'];
	$rp2 = $_POST['rp2'];
	$rp3 = $_POST['rp3'];
	$rp4 = $_POST['rp4'];
	$rp5 = $_POST['rp5'];
	$rp6 = $_POST['rp6'];
	$id_users = $_SESSION['id_user'];
	$inpak = $_POST['inpak'];
	$created_at = date('Y-m-d H:s:i');
	$updated_at = date('Y-m-d H:s:i');
	

	$result = $mysqli->query("INSERT INTO denom_koin ( denom_koin, rp1, rp2, rp3, rp4, rp5, rp6, inpak, id_users ,created_at, updated_at) VALUES ('$denom_koin','$rp1','$rp2','$rp3','$rp4','$rp5','$rp6','$inpak', '$id_users', '$created_at', '$updated_at')");
	
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		if ($_SESSION['level'] == 'karyawan') {
			echo "<script>
	       alert('Data berhasil di tambahkan');
	       window.location.href='../dashboard_karyawan.php';
	       </script>";
		}elseif ($_SESSION['level'] == 'manager') {
	       echo "<script>
	       alert('Data berhasil di tambahkan');
	       window.location.href='../dashboard_manager.php';
	       </script>";
		}
	}
?>
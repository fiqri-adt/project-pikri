<?php
session_start();

// Check Role Users Berdasarkan Session
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
		header('Location: dashboard_karyawan.php');
	}elseif($_SESSION['level'] == 'asmen'){
		header('Location: dashboard_u.php');
	} else {
		header('Location: login.php');
    }
}else{
	// Kodinsikan Jika Session Kosong
	header('Location: login.php');
}

?> 
<?php
session_start();
/* This will give an error. Note the output
 * above, which is before the header() call */
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
		header('Location: dashboard_karyawan.php');
	}elseif($_SESSION['level'] == 'asmen'){
		header('Location: dashboard_u.php');
	} else {
		header('Location: login.php');
    }
}
exit;
?> 
<?php
session_start();
<<<<<<< HEAD

// Kodinsikan Role Berdasarkan Sessioan
=======
/* This will give an error. Note the output
 * above, which is before the header() call */
>>>>>>> origin/master
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
		header('Location: dashboard_karyawan.php');
	}elseif($_SESSION['level'] == 'asmen'){
		header('Location: dashboard_u.php');
	} else {
		header('Location: login.php');
    }
<<<<<<< HEAD
}else{
	// Kodinsikan Jika Session Kosong
	header('Location: login.php');
}

exit;	
=======
}
exit;
>>>>>>> origin/master
?> 
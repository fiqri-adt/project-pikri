<?php 
	include "../cetak_pdf.php";
	
	session_start();
	include '../koneksi.php';
	$result = $mysqli->query("SELECT * FROM denom_kertas WHERE created_at BETWEEN 2021-01-04 AND 2021-01-04");

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}


?>
<html>
<head>
	<title>Laporan Absen Bulanan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Absen Bulanan</h4>
		<h5></h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Denom Kertas</th>
                <th>RP1</th>
                <th>RP2</th>
                <th>RP3</th>
                <th>RP4</th>
                <th>RP5</th>
                <th>RP6</th>
                <th>Inpak</th>
                <th>Total</th>
                <th>Tanggal</th>
			</tr>
		</thead>
		<?php 
		if ($result->num_rows > 0) {
			$no=1;
			while ($row = $result->fetch_assoc()) {
	       	?>
	        <tr>
	            <td><?php echo $no++; ?></td>
	            <td><?= $row['denom_kertas'] ?></td>
	            <td><?= $row['rp1'] ?></td>
	            <td><?= $row['rp2'] ?></td>
	            <td><?= $row['rp3'] ?></td>
	            <td><?= $row['rp4'] ?></td>
	            <td><?= $row['rp5'] ?></td>
	            <td><?= $row['rp6'] ?></td>
	            <td><?= $row['inpak'] ?></td>
	            <td>
	            <?php
	            $total_satu_baris = $mysqli->query("SELECT SUM(rp1)+SUM(rp2)+SUM(rp3)+SUM(rp4)+SUM(rp5)+SUM(rp6) as Total FROM denom_kertas WHERE id_denom_kertas= '".$row['id_denom_kertas']."'");
	            $data_total_satu_baris = $total_satu_baris->fetch_assoc();
	            foreach ($data_total_satu_baris as $key => $value) {
	                echo $value; 
	            }
	            ?>
	            <td><?= $row['created_at'] ?></td>
	            </td>
	        </tr>
	        <?php 
	        }
		}
		
		?>
	</table>
</body>
</html>
<?php
	$id_penjualan = $_GET['id'];
	$id_status = "2";
	$tanggal_update = "01-09-1002";
	$id_petugas = "010";
	echo'<h2> Terima Transaksi </h2>';
	echo '<br />';
					// connect database
					require_once('fungsi/config.php');
					//$db = mysql_connect($db_host, $db_username, $db_password, $db_database);
					//if (mysqli_connect_errno($db)){
					//	die ("Could not connect to the database: <br />". mysqli_connect_error( $db));
					//}
					
					//Asign a query
					$query = "UPDATE status_penjualan SET id_status='$id_status', tanggal_update='$tanggal_update',id_petugas='$id_petugas' where id_penjualan='$id_penjualan'";

					// Execute the query
					$result = mysql_query($query);
					if (!$result){
					   die ("Could not query the database: <br />". mysql_error());
					}
					
					if(mysql_errno() == 0)
					{
					$statun = " SELECT status.nama, status.id_status, status_penjualan.id_status, status_penjualan.id_penjualan, status_penjualan.tanggal_update 
								FROM status_penjualan RIGHT JOIN status
									ON status_penjualan.id_status = status.id_status
								WHERE  status_penjualan.id_penjualan = '$id_penjualan'";
					
					$result2 = mysql_query( $db,$statun );
					if (!$result2){
					   die ("Could not query the database: <br />". mysql_error());
					}
					
					echo '<table border ="0">';
					// Fetch and display the results
					while ($row = mysql_fetch_array($result)){
							echo '<tr>';
							echo '<td>Id Penjualan</td> ';
							echo '<td>:</td> ';
							echo '<td>'.$row['id_penjualan'].'</td> ';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Status</td> ';
							echo '<td>:</td> ';
							echo '<td>'.$row['nama'].'</td> ';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Tanggal Update</td> ';
							echo '<td>:</td> ';
							echo '<td>'.$row['tanggal_update'].'</td> ';
							echo '</tr>';
					}
					echo '</table>';
					echo "<br/> Telah berhasil diproses!!!";
					echo '<br />';
					echo '<br />';
					echo '<br />';
					}else{
							echo "Gagal proses ke database !!!".mysql_error();
					}
?>
<input type="button" value="Back" onclick="history.back(-1)" />
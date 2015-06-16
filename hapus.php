
<?php
	include "fungsi/config.php";
	$get_hapus = $_GET['id'];
	
	$query = mysql_query ("DELETE FROM barang WHERE id_barang ='$get_hapus'");
	echo "<p align=\"center\">data dengan id = $get_hapus sudah dihapus.</p></div>";
	echo "<a href=\"tampilkan.php\" align=\"center\"> kembali ke menu lihat</a>";

?>

<?php
//Detail mysql
 $host="localhost";
 $user="root";
 $pass="";
 $dbname="ecommerce";
 
 //Konek ke database
 $connect= mysql_connect($host, $user, $pass) or die(mysql_error());
 $dbselect = mysql_select_db($dbname);
 
 /**if($connect){
	//memilih database
	if($dbselect){
		echo "Berhasil menemukan database ".$dbname;
	}else{
		echo "Database ".$dbname." Tidak Ditemukan";
	}
 }else{
	echo "Koneksi database GAGAL";
 }*/
?>
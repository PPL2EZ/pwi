<?php
	session_start();

	//Include Config mysql
	include("config.php");
	
	//Membaca Masukin User saat Login
	$email = $_POST["email"];
	$password = $_POST["password"];
	$enpass=md5($password);
	
	//Mencegah MYSQL injection
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);

	
	//Melakukan pnengecekan ke database
	$q = mysql_query("select * from petugas where email='$email' and password='$enpass'");
 
	if (mysql_num_rows($q) == 0) {
		$_SESSION['id'] = $email;
		$_SESSION['pass'] = $enpass;
		//kalau username dan password sudah terdaftar di database
		header('location:../index.php');
	} else {
		//kalau username ataupun password tidak terdaftar di database
		header('location:../login.php?error=1');
		//echo mysql_num_rows($q);
		//echo md5($password);
	}
?>
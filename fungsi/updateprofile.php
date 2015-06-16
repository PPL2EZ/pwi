<?php
	session_start();
	//Menyertakan konfigurasi database
	require("config.php");
	//require("autentikasi.php");
	
	//Mengambil variabel dari form login 
	$passwordlama=$_POST["passwordlama"];
	$passwordbaru=$_POST["passwordbaru"];
	$confirmpassword=$_POST["cfmpassword"];

	
	//Convert to md5
	$passwordlama=md5($passwordlama);
	$passwordbaru=md5($passwordbaru);
	$confirmpassword=md5($confirmpassword);
	
	//Mengambil data dari session
	$mail=$_SESSION['id'];
	
	
	//cek passowrdlama
	$cek="select password from petugas where email='$mail' and password='$passwordlama'";
	$cek1=mysql_query($cek);
	if(!$cek1){
		die('Terjadi Kesalahan: '.mysql_error());
	}
	//Cek password dan confirm
	if ($passwordbaru != $confirmpassword)
	{
		header('location: ../profile.php?notif=1');
		break;
	}elseif (mysql_num_rows($cek1) == 1 ){
		$ganti="update petugas set password='$passwordbaru' where email='$mail'";
		$ganti1=mysql_query($ganti);
		if(!$ganti1){
			die('Terjadi Kesalahan: '.mysql_error());
		}
		header('location: ../profile.php?notif=3');
		break;
	}else {
		header('location: ../profile.php?notif=2'); 
	}

	
	
?>
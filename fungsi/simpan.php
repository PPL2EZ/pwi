<?php
	//Menyertakan konfigurasi database//
	include("config.php");
	
	//Mengambil variabel dari form login 
	$username=$_POST["username"];
	$passwordreg=$_POST["passwordreg"];
	$confirmpasswordreg=$_POST["confirmpasswordreg"];
	$email=$_POST["emailreg"];
	$enpass=md5($passwordreg);
	
	if ($passwordreg != $confirmpasswordreg){
		header("location:../register.php?error=1");
		break;
	}
	
	//Cek duplikasi database
	$cekdata="select nama, email from petugas where nama='$username' or email='$email'";
	$cek=mysql_query($cekdata);
	if(!$cek){
		die('Terjadi Kesalahan: '.mysql_error());
	}
	$row=mysql_num_rows($cek);
	//Mengirimkan Header 
	if ($row >= 1)
	{
		//echo "<h3>NIM telah Terdaftar! Silahkan diulangi.</h3>";
		//echo $row;		
		header("location:../register.php?error=1");
		
	} else
	{
		//Simpan ke database
		$simpan = mysql_query("insert into petugas values('', '$username', '$enpass', '$email')") or die(mysql_error());
		header("location:../register.php?message=sukses");
		//echo $row;	
	}
	
	//if ($simpan){
	//	header("location:../register.php?message=sukses");
	//}
	
	
?>
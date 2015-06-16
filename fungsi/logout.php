<html>
	<?php
		//lanjutkan session yang sudah dibuat sebelumnya
		session_start();
		include("config.php");
		
		if(isset($_SESSION["id"]) || isset($_SESSION["pass"])){
			$_SESSION = array();
			session_destroy();
			
			header("location:../login.php?session=1");
			//echo "Anda telah logout !!!<br>";
			//echo "Mau <a href='../login.php'>Login</a> lagi ??";
		} else {
			echo "Anda belum <a href='../login.php'>Login</a>";
		}	
	?>
</html>
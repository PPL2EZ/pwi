<!DOCTYPE HTML> 
<html>
	<head>
		 <meta charset="utf-8">
		
		<!-- Bootstrap -->
		<link href="style/css/bootstrap.min.css" rel="stylesheet">
		<link href="style/css.css" rel="stylesheet">
		<title>Login Page</title>
	</head>
	<body>
		<?php
			$err="";
		//Pesan Error	
		if (!empty($_GET["notif"])){
			if ($_GET["notif"] == 1){
				$err = "<p style='color:red'>Konfirmasi Password Salah</p>";
				//$er = "<font color='red'>*</font>";
			} elseif ($_GET["notif"] == 2){
				$err = "<p style='color:red'>Password Lama Tidak Sesuai</p>";
			} elseif ($_GET["notif"] == 3){
				$err = "<p style='color:red'>Password Berhasil Diganti</p>";
			}
		}	
		?>
		<div class="container">
			<form name="login" action="fungsi/forgotpass.php" method="post" role="form" class="form-signin">

					<h1 align="center">Reset Password</h1><br>
					<?php
						echo $err;
						
					?>
				
				<div>
					<label for="email">Email</label>
						<input type="text" id="email" name="email" class="form-control" placeholder="Email Akun">
					
						<label for="password">Password Baru</label>
					<input type="password" id="passwordbaru" name="passwordbaru" class="form-control" placeholder="Password Baru" required>
					<label for="cfmpassword">Confirm Password</label>
						<input type="password" id="cfmpassword" name="cfmpassword" class="form-control" placeholder="Confirm Password Baru" required>
					<br>
					<a href="login.php">Back</a>
					<br>
						<input type="submit" name="change" value="Change Password" class="btn btn-primary">
				
				</div>
		</form>
		</div>
	</head>
</html>
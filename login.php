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
			global $emailer,$er,$passer,$ror,$logout;
			if (!empty($_GET["error"])){
				if ($_GET['error'] == 1) {
					$err = "<p style='color:red'>Username dan Password tidak terdaftar!</p>";
				}
			}
			
			if (!empty($_GET["session"])){
				if ($_GET["session"] == 1){
					$err = "<p style='color:red'>Anda Telah Berhasil Logout</p>";
				}
			}
		?>
		<div class="container">
			<form name="login" action="fungsi/autentikasi.php" method="post" role="form" class="form-signin">

					<h1 align="center">Login Admin</h1><br>
					<?php
						echo $err;
						
					?>
				
				<div>
					<label for="inputEmail" >User Name</label>
					<input type="Email" id="inputEmail" name="email" class="form-control" placeholder="Masukkan Email anda" required>
					<label for="password">Password</label>
					<input type="Password" id="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
						<a href="forgotpassword.php" style="color:red">Forgot Password ?</a>	
					<br>
						<input type="submit" name="loginklik" value="Login" class="btn btn-primary">

					
				
				</div>
		</form>
		</div>
	</head>
</html>
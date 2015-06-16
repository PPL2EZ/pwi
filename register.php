<!DOCTYPE HTML>
<HTML>
	<head>
		<meta charset="utf-8">
		
		<!-- Bootstrap -->
		<link href="style/css/bootstrap.min.css" rel="stylesheet">
		<link href="style/css.css" rel="stylesheet">
		<title>Register</title>
	</head>
	<body>
	<?php
	
		$er = "";
		$err = "";
		if (!empty($_GET["error"])){
			if ($_GET["error"] == 1){
				$err = "<p style='color:red'>Pendaftaran Gagal, Username atau Email sudah Terpakai</p>";
				//$er = "<font color='red'>*</font>";
			}
		} 
		
		if (!empty($_GET['message']) && $_GET['message'] == 'sukses') {
			$err = "<p style='color:red'>Pendaftaran Berhasil!</p>";
		}
	?>
		<div class="container">
		<form action="fungsi/simpan.php" method="post" class="form-signin" role="form">
		<h1 align="center">Form Registrasi</h1>
		<?php
			echo $err;
						
		?>
						<label for="username">Username </label>								
						<input id="username" type="text" name="username" class="form-control" placeholder="Username anda" required>				
						<label for="password">Password </label>
						<input id="password" type="Password" name="passwordreg" class="form-control" placeholder="Password anda" required><?php echo $er;?>
						<label for="confirm">Confirm Password</label>					
						<input id="confirm" type="Password" name="confirmpasswordreg" class="form-control" placeholder="Konfirmasi Password anda" required>
						<label id="email">Email</label>
						<input id="email" type="Email" name="emailreg" class="form-control" placeholder="Email anda" required>					
						<br>
						<input type="submit" name="register" value="Register" class="btn btn-primary">
						<br>
						Kembali ke daftar <a href="datamember.php">Admin</a>
					
			</div>
		</form>
		<div class="container">
	</body>
</HTML>
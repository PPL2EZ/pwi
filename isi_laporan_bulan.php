	<?php
		session_start();
		include('config.php');
		
		if( !isset($_SESSION['id']) || !isset($_SESSION['pass']) ) {
		die( 'Silahkan <a href="login.php">login</a> terlebih dahulu');
	}
	?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>


    <!-- Bootstrap Core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Metro Bootstrap -->
	<link href="style/css/metro-bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="style/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Custom Tabel Laporan -->
	<link href="style/css/tabel/tabel.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
						<?php 
							echo $_SESSION['id'];
						?> 
						<b class="caret"></b>
					</a> 
					<ul class="dropdown-menu">					
						<li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
						</li>                    
                        <li class="divider"></li>
                        <li>
                            <a href="fungsi/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posting"><i class="fa fa-fw fa-file"></i> Posting Manager<i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="posting" class="collapse">
							<li>
								<a href="upload.php">Add New</a>
							</li>
							<li>
								<a href="tampilkan.php">View All</a>
							</li>
						</ul>
					</li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#laporan"><i class="fa fa-fw fa-file"></i> Laporan Manager<i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="laporan" class="collapse">
							<li>
								<a href="isi_laporan_bulan.php" >Laporan Manager</a>
							</li>
							<li>
								<a href="total_laporan.php">Semua Laporan</a>
							</li>
						</ul>
					</li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#transaksi"><i class="fa fa-fw fa-file"></i> Transaksi Manager<i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="transaksi" class="collapse">
							<li>
								<a href="isi_transaksi_bulan.php">Transaksi Pending</a>
							</li>
							<li>
								<a href="semua_transaksi.php">Semua Transaksi</a>
							</li>
						</ul>
					</li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#petugas"><i class="fa fa-fw fa-file"></i> Petugas Manager<i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="petugas" class="collapse">
							<li>
								<a href="datamember.php">Daftar Member</a>
							</li>
						</ul>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
			
			<!-- main page -->
			<div id="page-wrapper">
				<div class="container-fluid">
                <!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								Laporan Transaksi
							</h1>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Laporan Bulanan</h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<form action="isi_laporan_bulan.php">
										<select name="bulan" id="bulan" method="GET">
											<option value="">Pilih Bulan</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
										<select name="tahun" id="tahun" method="GET" onChange='this.form.submit()'>
												<!-- <option>Tahun</option> -->
											<?php
												echo"<option value=''>Pilih Tahun</option>";
												for($i=date('Y'); $i>=date('Y')-32; $i-=1){
													echo"<option  value='$i'> $i </option>";
												}
											?>
										</select>
									</form>
									<?php
										$bulan = @$_GET['bulan'];
										$tahun = @$_GET['tahun'];
										$namabulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
										echo '<p style="margin-left:20px;">'.@$namabulan[$bulan - 1].' ',$tahun,'</p>';
										$kategori = ['Komputer','Smartphone', 'Accesoris'];
										for ($i=0; $i<=2 ;$i++){
														echo '<table id="box-table-a">';
															echo'<tr><th colspan="9" style="background:#a8bcff;"><h2 style="text-align:center; font-weight:bold; color:#012878;">'.$kategori[$i].'</h2></th></tr>';
															echo'<tr >';
																echo'<th scope="col" width=50px>No</th>';
																echo'<th scope="col" width=100px>Id Penjualan</th>';
																echo'<th scope="col" width=100px>Id Barang</th>';
																echo'<th scope="col" width=100px>Nama</th>';
																echo'<th scope="col" width=200px>Tanggal Pembelian</th>';
																echo'<th scope="col" width=150px>Harga</th>';
																echo'<th scope="col" width=100px>Quantitas</th>';
																echo'<th scope="col" width=150px>Total Harga</th>';
															echo'</tr>';
															// connect database
															require_once('fungsi/config.php');
																												
															//Asign a query
															$query = " SELECT barang.id_barang , barang.nama, barang.harga , detail_penjualan.id_penjualan ,detail_penjualan.quantity , penjualan.tgl_penjualan, penjualan.total_harga  
																		FROM barang RIGHT JOIN detail_penjualan
																			ON barang.id_barang = detail_penjualan.id_barang
																			RIGHT JOIN penjualan
																			ON detail_penjualan.id_penjualan = penjualan.id_penjualan
																			LEFT JOIN kategori
																			ON kategori.id_kategori = barang.id_kategori
																		WHERE kategori.nama = '$kategori[$i]' and MONTH(penjualan.tgl_penjualan) = '$bulan'and YEAR(penjualan.tgl_penjualan) = '$tahun'";
															
															// Execute the query
															$result = mysql_query($query );
															if (!$result){
																die ("Could not query the database: <br />". mysqli_error($connect));
															}
															$z=1;
															// Fetch and display the results
															while ($row = mysql_fetch_array($result)){
																echo '<tr>';
																	echo '<td align="center">'.$z++.'</td>';
																	echo '<td align = "center" >'.$row['id_penjualan'].'</td> ';
																	echo '<td align = "center">'.$row['id_barang'].'</td> ';
																	echo '<td align = "center">'.$row['nama'].'</td> ';
																	echo '<td align = "center">'.$row['tgl_penjualan'].'</td> ';
																	echo '<td align = "center">'.$row['harga'].'</td>';
																	echo '<td align = "center">'.$row['quantity'].'</td>';
																	echo '<td align = "center">'.$row['total_harga'].'</td>';
																echo '</tr>';
															}
															echo'<tr>';
																$jumlah = "SELECT SUM(penjualan.total_harga) AS total_semua 
																	FROM barang RIGHT JOIN detail_penjualan
																		ON barang.id_barang = detail_penjualan.id_barang
																		RIGHT JOIN penjualan
																		ON detail_penjualan.id_penjualan = penjualan.id_penjualan
																		LEFT JOIN kategori
																		ON kategori.id_kategori = barang.id_kategori
																	WHERE kategori.nama = '$kategori[$i]' and MONTH(penjualan.tgl_penjualan) = '$bulan'and YEAR(penjualan.tgl_penjualan) = '$tahun'";
																$result2 = mysql_query($jumlah );
																if (!$result2){
																	die ("Could not query the database: <br />".mysql_error($connect));
																}
																while ($row2 = mysql_fetch_array($result2)){
																	echo'<td colspan="7" align="center">Jumlah</td>';
																	echo'<td align="center">'.$row2['total_semua'].'</td>';
																}
															echo '</tr>';
														echo '</table>';
														echo '<br />';
										}
										mysql_free_result($result);
										mysql_close($connect);
									?>
									<div class="metro">
										<input type="button" class="button primary" value="Go Back" onclick="history.back(-1)" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!-- /.row -->
			</div>
            <!-- /.container-fluid -->
			
           
            <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->
	    <!-- jQuery -->
    <script src="style/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="style/js/bootstrap.min.js"></script>
</body>

</html>



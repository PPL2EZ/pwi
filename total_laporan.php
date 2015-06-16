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
	
	<!-- Custom Tabel -->
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
								<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Semua Laporan</h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<?php
										$kategori = ['komputer','smartphone', 'accesoris'];
										echo '<table id="one-column-emphasis">';
											echo'<tr >';
												echo'<th>No</th>';
												echo'<th scope="col">Id Penjualan</th>';
												echo'<th scope="col">Id Barang</th>';
												echo'<th scope="col">Nama</th>';
												echo'<th scope="col">Tanggal Pembelian</th>';
												echo'<th scope="col">Harga</th>';
												echo'<th scope="col">Quantitas</th>';
												echo'<th scope="col">Total Harga</th>';
											echo'</tr>';
							
											// connect database
											require_once('fungsi/config.php');
											//$db = new mysqli($db_host, $db_username, $db_password, $db_database);
											//if ($db->connect_errno){
											//	die ("Could not connect to the database: <br />". $db->connect_error);
											//}
											
											//Asign a query
											$query = " SELECT barang.id_barang , barang.nama, barang.harga , detail_penjualan.id_penjualan ,detail_penjualan.quantity , penjualan.tgl_penjualan, penjualan.total_harga  
														FROM barang RIGHT JOIN detail_penjualan
															ON barang.id_barang = detail_penjualan.id_barang
															RIGHT JOIN penjualan
															ON detail_penjualan.id_penjualan = penjualan.id_penjualan
															LEFT JOIN kategori
															ON kategori.id_kategori = barang.id_kategori";
											
											// Execute the query
											$result = mysql_query( $query );
											if (!$result){
											   die ("Could not query the database: <br />". mysql_error());
											}
											$z=1;
											// Fetch and display the results
											//while ($row = $result->fetch_object()){
											while ($row = mysql_fetch_array($result)){
													echo '<tr>';
													echo '<td align="center">'.$z++.'</td>';
													echo '<td align = "center">'.$row['id_penjualan'].'</td> ';
													echo '<td align = "center">'.$row['id_barang'].'</td> ';
													echo '<td align = "center">'.$row['nama'].'</td> ';
													echo '<td align = "center">'.$row['tgl_penjualan'].'</td> ';
													echo '<td align = "center">'.$row['harga'].'</td>';
													echo '<td align = "center">'.$row['quantity'].'</td>';
													echo '<td align = "center">'.$row['total_harga'].'</td>';
													echo '</tr>';
																			}
										echo'<tr>';
										$jumlah = "SELECT SUM(penjualan.total_harga) AS total_semua FROM penjualan ";
										$result2 = mysql_query( $jumlah );
										//	if (!$result2){
										//	   die ("Could not query the database: <br />". $db->error);
										//	}
										while ($row2 = mysql_fetch_array($result2)){
											echo'<td colspan="7" align="center">Jumlah</td>';
											echo'<td align="center">'.$row2['total_semua'].'</td>';
										}
										echo'</tr>';
										echo '</table>';
										echo '<br />';
										//echo '<br />';
							
										//$result->free();
										//$db->close();
									?>
									<div class="metro">
										<input type="button" class="button primary" value="Go Back" onclick="history.back(-1)" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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



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
                <!-- Page Heading -->	
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								Data Barang
							</h1>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="panel panel-default">
							<?php
								include "fungsi/config.php";
								$get_hapus = $_GET['id'];
								
								$query = mysql_query ("select * FROM barang WHERE id_barang ='$get_hapus'");
								$data = mysql_fetch_array($query);
							?>
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> <?=@$data['nama'];?></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">									
									<table id="one-column-emphasis">
										<tr>	
											<td style="text-align:left;">Id Barang</td> <td>:</td>
											<td style="text-align:left;"><?=$data['id_barang'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Gambar</td> <td>:</td>
											<td style="text-align:left;"><img src="./fileupload/<?=$data['file_gambar'];?>"width="50" height="50"></td>
										</tr>
										<tr>
											<td style="text-align:left;">Nama Barang</td> <td>:</td>
											<td style="text-align:left;"><?=$data['nama'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Harga</td> <td>:</td>
											<td style="text-align:left;"><?=$data['harga'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Keterangan</td> <td>:</td>
											<td style="text-align:left;"><?=$data['keterangan'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Stok</td> <td>:</td>
											<td style="text-align:left;"><?=$data['stok'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Berat</td> <td>:</td>
											<td style="text-align:left;"><?=$data['berat'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Tanggal  Insert (yyyy-mm-dd)</td> <td>:</td>
											<td style="text-align:left;"><?=$data['tanggal_insert'];?></td>
										</tr>
										<tr>
											<td style="text-align:left;">Tanggal Update (yyyy-mm-dd)</td> <td>:</td>
											<td style="text-align:left;"><?=$data['tanggal_update'];?></td>
										</tr>
									</table>
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
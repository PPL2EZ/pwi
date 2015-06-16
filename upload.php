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

    <!-- Custom CSS -->
    <link href="style/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="style/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
				

<h1 align="center">TAMBAH DATA</h1>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        <table border="0" align="center" width="50%">
		<tr>
			<td>
				<label for="idbarang"><b>Id Barang </b></label> 
			</td>
			<td>				
				<input id="idbarang" type="text" name="idbarang" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
	    <tr>
			<td>
				<label for="namabarang"><b>Nama Barang</b></label>
			</td>
			<td>
				<input id="namabarang" type="text" name="namabarang" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Kategori</td></b>
			<td>
				<?php
				require_once('fungsi/config.php');				
				$sql2 ="SELECT id_kategori,nama FROM kategori"; 
				$result2 = mysql_query($sql2 );
					if (!$result2){
					   die ("Could not query the database: <br />".mysql_error());
					}
				?>
				<select name="idkategori"><option>Silahkan pilih</option>
				<?php
					while($tampil=mysql_fetch_array($result2)) {
						if ($tampil['id_kategori']!=""){
						echo "<option value='". $tampil['id_kategori']."'>". $tampil['nama']."</option>";
					} else{
						echo "<option value='none'>tidak ada data</option>";
				  }
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Keterangan</td></b>
			<td>
				<textarea name="keterangan" rows="5" cols="40" class="form-control" required></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Harga </td></b>
			<td> 
				<input type="text" name="harga" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Berat </b>
			</td>
			<td>
				<input type="text" name="berat" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Stock </b>
			</td>
			<td>
				<input type="text" name="stock" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Tanggal Insert </b>
			</td>
			<td>
				<input type="date" name="tanggalinsert" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td>
				<b>Tanggal Update <b>
			</td>
			<td>
				<input type="date" name="tanggalupdate" class="form-control" required/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
        <tr>
			<td>
				<b>File :</td>
			<td>
				</b> <input type="file" name="berkas" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" name="btn-upload" value="Upload" /> 
			</td>
		</tr>
		</table>
    </form>
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



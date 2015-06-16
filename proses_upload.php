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
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
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
				
<?php
	include("fungsi/config.php");

	if($_POST['btn-upload'] == "Upload")
	{
		$nama_berkas = $_FILES['berkas']['name'];
		$tipe_berkas = $_FILES['berkas']['type'];
		$ukuran_berkas = $_FILES['berkas']['size'];
		$id_barang = $_POST['idbarang'];
		$nama = $_POST['namabarang'];
		$id_kategori = $_POST['idkategori'];
		$keterangan = $_POST['keterangan'];
		$harga = $_POST['harga'];
		$berat = $_POST['berat'];
		$stock = $_POST['stock'];
		$tgl_insert = $_POST['tanggalinsert'];
		$tgl_update = $_POST['tanggalupdate'];
		if($nama_berkas != "")
		{
			if($tipe_berkas == "image/jpeg" or $tipe_berkas == "image/pjpeg" or $tipe_berkas == "image/jpg" or $tipe_berkas == "image/png")
			{
				if($ukuran_berkas <= 1000000)
				{
					$sumber = $_FILES['berkas']['tmp_name'];					
					
					$exp_tipe_berkas = explode("/",$tipe_berkas);
					$nama_berkas_baru = "gbr_".date("YmdHis").".".$exp_tipe_berkas[1];
					
					$target = "fileupload/$nama_berkas_baru";
					
					if(move_uploaded_file($sumber,$target))
					{
						$sql = "INSERT INTO barang VALUES('$id_barang','$nama','$id_kategori','$keterangan','$nama_berkas_baru','','$harga','$berat','$stock','$tgl_insert','$tgl_update')";
						mysql_query($sql);
						if(mysql_errno() == 0)
						{
							echo "<b>Nama barang :</b> $nama";
							echo "<br/><b>id barang :</b> $id_barang";
							echo "<br/><b>harga :</b> $harga";
							echo "<br/><b>Nama File :</b> $nama_berkas";
							echo "<br/><b>Tipe File :</b> $tipe_berkas";
							echo "<br/><b>Ukuran File :</b> $ukuran_berkas bytes";
							echo "<br/> Telah berhasil ditambahkan !!!";	
						}else{
							echo "Gagal menyimpan nama file gambar ke database !!!".mysql_error();
						}
					}else{
						echo $_FILES['berkas']['error'];
					}
				}else{
					echo "Ukuran file maks. 1Mb !!!";
				}
			}else{
				echo "File hanya boleh Gambar JPEG, JPG dan PNG !!!";
			}
		}
	}
?>
</br><a href="tampilkan.php">tampilkan</a>

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



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
    <link href="style/css.css" rel="stylesheet">

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
						include("fungsi/config.php");
						$sql=mysql_query("select * from petugas");
						while($row=mysql_fetch_array($sql))
							{
							if (($row["email"] == $_SESSION['id']) && ($row["id_petugas"] == 1)){
								echo 'ADMIN';
							}elseif (($row["email"] == $_SESSION['id']) && ($row["id_petugas"] != 1)){
								echo $_SESSION['id'];
								}
							}
							
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
                            Data Member
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Tabel Admin</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped" id="tabell">
                                        <thead>
                                            <tr>
                                                <th>User_id</th>
                                                <th>Username</th>
                                                <th>Email</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											include("fungsi/config.php");
											$sql=mysql_query("select * from petugas");
											while($row=mysql_fetch_array($sql))
											{
												$id=$row["id_petugas"];
												$username=$row["nama"];
												$email=$row["email"];	
												
										?>
											<tr id="<?php echo $id; ?>">
                                                <td style="width:20%">
													<span id="id_<?php echo $id; ?>" class="text">
														<?php echo $id; ?>
													</span>
													<input type="text" value="<?php echo $id; ?>" class="editbox" id="id1_<?php echo $id; ?>";>
												</td>
												<td style="width:20%">
													<span id="first_<?php echo $id; ?>" class="text">
														<?php echo $username; ?>
													</span>
													<input type="text" value="<?php echo $username; ?>" class="editbox" id="first1_<?php echo $id; ?>";>
												</td>
                                                <td style="width:20%">
													<span id="mail_<?php echo $id; ?>" class="text">
														<?php echo $email; ?>
													</span>
													<input type="Email" value="<?php echo $email; ?>"  class="editbox" id="mail1_<?php echo $id; ?>";>
												</td>
                                                <td style="width:20%" id="tabelldal">
													<table id="tabelldall">
														<tr id="tabelldalll">
															<td align="center" colspan="2">
																<a href="fungsi/deletedata.php?remove=<?php echo $id;?>">
																	<button id="delette_<?php echo $id; ?>" type="button" class="btn btn-danger delette" <?php 
																		
																	?>>Delete</button>
				
																</a>
																<a href="">
															</td>
														</tr>
													</table>
												
												</td>
                      
                                            </tr>
										<?php
											}
										?>
                                        </tbody>
                                    </table>
											<a href="register.php">Register Admin Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
			</div>
            <!-- /.container-fluid -->
			
            </div>
            <!-- /.container-fluid -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="style/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="style/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="style/js/javascript.js"></script>
</body>

</html>



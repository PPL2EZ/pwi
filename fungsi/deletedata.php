<?php
	include("config.php");
	
											$sql=mysql_query("select * from petugas");
											while($row=mysql_fetch_array($sql))
											{
												$id=$row["id_petugas"];
												$username=$row["nama"];
												$email=$row["email"];}	
	if ($_GET['$id'] != 1 ){
	if(isset($_GET['remove'])){	
		$id = $_GET['remove'];
		$query = " DELETE FROM petugas WHERE id_petugas='$id'";
		// Execute the query
		//$result = $db->query( $query );
		$result = mysql_query($query );
		
		if (!$query){
			 die ("Could not query the database: <br />".  mysql_error());
		}else{
			echo '<br/>Data has been deleted.<br /><br />';
			header("Location: ../dataadmin.php");
		}
	}
	}
?>
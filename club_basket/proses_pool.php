<?php 

// print_r($_GET);

$conn = mysqli_connect("localhost", "root", "", "db_club");

// Pool
$pool = $_GET["pool"];
$jumlah=count($pool);

for($i=0;$i<$jumlah;$i++) {
		if (trim($_GET['pool'][$i])!='') {
			$sql = "UPDATE tbl_tim SET pool = '".strtoupper($_GET['pool'][$i])."' WHERE id ='".$_GET['klubid'][$i]."' ";
			mysqli_query($conn, $sql); 

		}
	}
	echo "Data sudah terupdate";

mysqli_close($conn);




 ?>
<?php 

// var_dump($_GET);

$conn = mysqli_connect("localhost", "root", "", "db_club");

// hasil DHU 1
$hasil1 = $_GET["teamA"];
$jumlah1 = count($hasil1);
// Hasil DHU 2
$hasil2 = $_GET["teamC"];
$jumlah2 = count($hasil2);
// Hasil KTJY
$hasil3 = $_GET["teamE"];
$jumlah3 = count($hasil3);

// Proses DHU 1
for($i=0;$i<$jumlah1;$i++) {
		if (trim($_GET['teamA'][$i])!='') {
			$sql = "UPDATE tbl_jadwal SET skor_terang = '".$_GET['teamA'][$i]."', skor_gelap = '".$_GET['teamB'][$i]."' WHERE id ='".$_GET['idA'][$i]."'";
			mysqli_query($conn, $sql);
		}
	}

// Proses DHU 2
for($i=0;$i<$jumlah2;$i++) {
		if (trim($_GET['teamC'][$i])!='') {
			$sql = "UPDATE tbl_jadwal SET skor_terang = '".$_GET['teamC'][$i]."', skor_gelap = '".$_GET['teamD'][$i]."' WHERE id ='".$_GET['idC'][$i]."'";
			mysqli_query($conn, $sql);
		}
	}

// Proses KTJY
for($i=0;$i<$jumlah3;$i++) {
		if (trim($_GET['teamE'][$i])!='') {
			$sql = "UPDATE tbl_jadwal SET skor_terang = '".$_GET['teamE'][$i]."', skor_gelap = '".$_GET['teamF'][$i]."' WHERE id ='".$_GET['idE'][$i]."'";
			mysqli_query($conn, $sql);
		}
	}

	echo "Terima kasih,pertandingan telah selesai";

mysqli_close($conn);



 ?>
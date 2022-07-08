<?php 
include ("fungsi.php");
// print_r($_POST);

$conn = mysqli_connect("localhost", "root", "", "db_club") or die("maaf, koneksi ke database gagal");

	// Data Team
	$klub = $_POST['klub'];
	$kota = $_POST['kotaklub'];
	$ku   = $_POST['ku'];
	
	$sql = "INSERT INTO tbl_tim (id, code, klub, kota, KU) VALUES ('', '$code', '$klub', '$kota', '$ku')";
	mysqli_query($conn, $sql);
	$tim = mysqli_insert_id($conn);
	$code = generate_booking_code($tim);
	$sql = "UPDATE tbl_tim SET code='$code' WHERE id='$tim'";
	mysqli_query($conn, $sql);
	fiestoupload("logo", "file/reg/logo", $tim, 1000000);

	// Data Official
	for($i=0;$i<5;$i++) {
		if (trim($_POST['namaofficial'][$i])!='') {
			$sql = "INSERT INTO tbl_official (tim, nama, posisi) VALUES ('$tim', '".$_POST['namaofficial'][$i]."', '".$_POST['posisiofficial'][$i]."');";
			mysqli_query($conn, $sql); 
		}
	}
	// Data Pemain
	for($i=0;$i<15;$i++) {
		if (trim($_POST['namapemain'][$i])!='') {
			$sql = "INSERT INTO tbl_pemain (tim, nama, kota_kelahiran, tgl_lahir, tb, bb, posisi, no_punggung) VALUES ('$tim', '".$_POST['namapemain'][$i]."', '".$_POST['kotapemain'][$i]."', '".$_POST['tanggalpemain'][$i]."' , '".$_POST['tinggipemain'][$i]."' , '".$_POST['beratpemain'][$i]."' , '".$_POST['posisipemain'][$i]."','".$_POST['no_punggung'][$i]."');";
			mysqli_query($conn, $sql); 
		}
	}

	// Query header
	$sql = "SELECT klub, kota, KU FROM tbl_tim WHERE id = '$tim'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "<h1>".$row['klub']." ".$row['kota']." ".$row['KU']."</h1>";

	// Query official
	echo "<h2>Official</h2>";
	$sql = "SELECT nama,posisi FROM tbl_official WHERE tim = '$tim'";
	$result = mysqli_query($conn, $sql);
	echo "<div class=\"row\">";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class=\"col-md-3 col-xs-6\">".$row['nama']."<br>".$row['posisi']."</div>";
	}
	echo "</div>";


	// Query Pemain 
	echo "<h2>Pemain</h2>";
	$sql = "SELECT nama,posisi FROM tbl_pemain WHERE tim = '$tim'";
	$result = mysqli_query($conn, $sql);
	echo "<div class=\"row\">";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div class=\"col-md-3 col-xs-6\">".$row['nama']."<br>".$row['posisi']."</div>";
	}
	echo "</div>";

mysqli_close($conn);

 ?>
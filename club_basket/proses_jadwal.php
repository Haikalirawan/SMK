<?php  

// print_r($_GET);

$conn = mysqli_connect("localhost", "root", "", "db_club") or die("maaf, koneksi ke database gagal");
$result = mysqli_query($conn, "SELECT klub FROM tbl_tim WHERE KU = 'KU-16 Putra' AND pool = 'a'");
$jumlah_data = mysqli_num_rows($result);
$jumlah_tanding = $jumlah_data * ($jumlah_data - 1) / 2;

	// Data jadwal
	for($i=0;$i<$jumlah_tanding;$i++) {
			$sql = "INSERT INTO tbl_jadwal (waktu, venue, terang, gelap) VALUES ('".$_GET['waktu'][$i]."', '".$_GET['venue'][$i]."', '".$_GET['terang'][$i]."', '".$_GET['gelap'][$i]."');";
			mysqli_query($conn, $sql);
	}
	echo "Data berhasil ditambahkan";

mysqli_close($conn);


?>
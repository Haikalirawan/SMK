<?php  

$conn = mysqli_connect("localhost", "root", "", "db_club") or die("maaf, koneksi ke database gagal");
$myresult = mysqli_query($conn,"SELECT KU FROM tbl_tim");

if (isset($_GET["tgl"])) {
	$result = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'DHU 1' AND DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
	$sql = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'DHU 2' AND DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
	$sqli = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'KTJY' AND  DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
} else {
	$result = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'DHU 1' ORDER BY waktu ASC");
	$sql = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'DHU 2' ORDER BY waktu ASC");
	$sqli = mysqli_query($conn, "SELECT id,venue,waktu,terang,gelap FROM tbl_jadwal WHERE venue = 'KTJY' ORDER BY waktu ASC");
}
$myrow = mysqli_fetch_assoc($myresult);
$jumlah_data_DHU1 = mysqli_num_rows($result);
$jumlah_data_DHU2 = mysqli_num_rows($sql);
$jumlah_data_KTJY = mysqli_num_rows($sqli);
// var_dump($row['id']);
echo "<title>Hasil Pertandingan</title>";

echo "<h1>Hasil Pertandingan</h1>
		<h3>Tanggal : ".$_GET['tgl']."</h3>
<br>

	
	<h4>DHU 1</h4>
	<form action='proses_hasil.php' method='GET'>
	<table border='1' cellpadding='10' cellspacing='0'>
		<tr>
			<th>No</th>
			<th>Waktu</th>
			<th>KU</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_DHU1; $i++) {
			while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
						<td>$j</td>
						<td>".$row['waktu']."</td>
						<td>".$myrow['KU']."</td>
						<td>".$row['terang']."</td>
						<td><input type='text' size='5' name='teamA[]'><input type='hidden' name='idA[]' value='".$row['id']."'></td>
						<td><input type='text' size='5' name='teamB[]'><input type='hidden' name='idB[]'></td>
						<td>".$row['gelap']."</td>
				  </tr>";
				  $j++;
			}
		}
echo "</table>
	<br>


	<h4>DHU 2</h4>
	<table border='1' cellpadding='10' cellspacing='0'>
		<tr>
			<th>No</th>
			<th>Waktu</th>
			<th>KU</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_DHU2; $i++) {
			while ($rows = mysqli_fetch_assoc($sql)) { 
			echo "<tr>
						<td>$j</td>
						<td>".$rows['waktu']."</td>
						<td>".$myrow['KU']."</td>
						<td>".$rows['terang']."</td>
						<td><input type='text' size='5' name='teamC[]'><input type='hidden' name='idC[]' value='".$rows['id']."'></td>
						<td><input type='text' size='5' name='teamD[]'><input type='hidden' name='idD[]'></td>
						<td>".$rows['gelap']."</td>
				  </tr>";
				  $j++;
			}
		}
echo "</table>

<br>

	<h4>KTJY</h4>
	<table border='1' cellpadding='10' cellspacing='0'>
		<tr>
			<th>No</th>
			<th>Waktu</th>
			<th>KU</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_KTJY; $i++) {
		while ($rowi = mysqli_fetch_assoc($sqli)) {
			echo "<tr>
						<td>$j</td>
						<td>".$rowi['waktu']."</td>
						<td>".$myrow['KU']."</td>
						<td>".$rowi['terang']."</td>
						<td><input type='text' size='5' name='teamE[]'><input type='hidden' name='idE[]' value='".$rowi['id']."'></td>
						<td><input type='text' size='5' name='teamF[]'><input type='hidden' name='idF[]'></td>
						<td>".$rowi['gelap']."</td>
				  </tr>";
				  $j++;
		 	}
		}
echo "</table>

		<br>

	<button type='submit'>Save</button>
  </form>";


?>
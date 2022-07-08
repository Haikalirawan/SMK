<?php  
include "mysql.php";
// Koneksi ke Database
$mysql=new Mysqli_db("192.168.111.1", "generik", "generik", "iwd_cls");

if (isset($_GET["tgl"])) {
	$result = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'DHU 1' AND DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
	$sql = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'DHU 2' AND DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
	$sqli = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'KTJY' AND  DATE_FORMAT(waktu, '%Y-%m-%d') ='".$_GET["tgl"]."' ORDER BY waktu ASC");
} else {
	$result = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'DHU 1' ORDER BY waktu ASC");
	$sql = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'DHU 2' ORDER BY waktu ASC");
	$sqli = $mysql->query("SELECT id,venue,waktu,terang,gelap,KU,pool FROM tbl_jadwal WHERE KU = 'KU-12 putra' AND pool = upper('a') AND venue = 'KTJY' ORDER BY waktu ASC");
}
$jumlah_data_DHU1 = $mysql->num_rows($result);
$jumlah_data_DHU2 = $mysql->num_rows($sql);
$jumlah_data_KTJY = $mysql->num_rows($sqli);
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
			<th>Pool</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_DHU1; $i++) {
			while ($row = $mysql->fetch_assoc($result)) {
			echo "<tr>
						<td>$j</td>
						<td>".$row['waktu']."</td>
						<td>".$row['KU']."</td>
						<td>".$row['pool']."</td>
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
			<th>Pool</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_DHU2; $i++) {
			while ($rows = $mysql->fetch_assoc($sql)) { 
			echo "<tr>
						<td>$j</td>
						<td>".$rows['waktu']."</td>
						<td>".$rows['KU']."</td>
						<td>".$rows['pool']."</td>
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
			<th>Pool</th>
			<th colspan='2'>Terang</th>
			<th colspan='2'>Gelap</th>
		</tr>";

		$j = 1; 
		for ($i=1; $i<=$jumlah_data_KTJY; $i++) {
		while ($rowi = $mysql->fetch_assoc($sqli)) {
			echo "<tr>
						<td>$j</td>
						<td>".$rowi['waktu']."</td>
						<td>".$rowi['KU']."</td>
						<td>".$rowi['pool']."</td>
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
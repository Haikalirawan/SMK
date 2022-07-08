<?php 

$conn = mysqli_connect("localhost", "root", "", "db_club") or die("Maaf gagal terhubung ke Database");
$result = mysqli_query($conn, "SELECT klub FROM tbl_tim WHERE KU = 'KU-16 Putra' AND UPPER(pool) = UPPER('a')");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}	
// print_r($rows);
// echo $rows[0]['klub'];

$jumlah_data = mysqli_num_rows($result);
$jumlah_tanding = $jumlah_data * ($jumlah_data - 1) / 2;


	echo "<h2>Jadwal Pertandingan</h2>

<form action='proses_jadwal.php' method='GET'>

<table border='1' cellpadding='10' cellspacing='0'>
		<tr>
			<th>No</th>
			<th>waktu</th>
			<th>venue</th>
			<th>terang</th>
			<th>gelap</th>
		</tr>

		
		<tr>";
			for ($i=1; $i<=$jumlah_tanding; $i++) { 
				echo "<td>$i</td>
					  <td><input type='text' name='waktu[]'' value='' class='waktu'></td>
					 <td>
						<select name='venue[]'>
							<option value=''></option>
							<option value='DHU 1'>DHU 1</option>
							<option value='DHU 2'>DHU 2</option>
							<option value='KTJY'>KTJY</option>
						</select>													
					</td>

					<td>
					   <select name='terang[]'>
					   <option value=''></option>";
					   	for ($x=0; $x<$jumlah_data; $x++) { 
						 echo "<option value = '".$rows[$x]['klub']."'>".$rows[$x]['klub']."</option>";
						}
					   
				echo "
					   </select>
					</td>

					<td>
						<select name='gelap[]'>
						<option value=''></option>";
						for ($x=0; $x<$jumlah_data; $x++) { 
						 echo "<option value = '".$rows[$x]['klub']."'>".$rows[$x]['klub']."</option>";
						}
						
				echo "
					   </select>
					</td>
		</tr>";

			}		
echo "</table>

		<br>

	<button type='submit'>Save</button>
  </form>";

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jadwal Pertandingan</title>
	<link rel="stylesheet" type="text/css" href="js/css/default/zebra_datepicker.css">
	<script type="text/javascript" src="js/zebra_datepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="js/zebra_datepicker.src.js"></script>
</head>
<body>


<script>
	$(document).ready(function(){
	$('.waktu').Zebra_DatePicker({
    format: 'Y-m-d H:i'
	});
});
</script>


</body>
</html>
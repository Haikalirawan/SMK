<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="js/css/default/zebra_datepicker.css">
	<script type="text/javascript" src="js/zebra_datepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="js/zebra_datepicker.src.js"></script>
</head>
<body>
	
	<h1>Pendaftaran team basket</h1>



<!-- Pendaftaran Team -->
	<form action="proses.php" method="POST" enctype="multipart/form-data">


		<label for="klub">Klub :</label>
		<input type="text" name="klub" id="klub" autocomplete="off">

<br>
<br>
		<label for="kota">Kota :</label>
		<input type="text" name="kotaklub" id="kotaklub" autocomplete="off">

<br>
<br>
		<label for="logo">Logo :</label>
		<input type="file" name="logo" id="logo">

<br>
<br>

		<label for="ku">KU :</label>
		<select name="ku" id="ku">
			<option value=""></option>
			<option value="KU-8">KU-8</option>
			<option value="KU-10 Putra">KU-10 Putra</option>
			<option value="KU-10 Putri">KU-10 Putri</option>
			<option value="KU-12 Putra">KU-12 Putra</option>
			<option value="KU-12 Putri">KU-12 Putri</option>
			<option value="KU-14 Putra">KU-14 Putra</option>
			<option value="KU-14 Putri">KU-14 Putri</option>
			<option value="KU-16 Putra">KU-16 Putra</option>
			<option value="KU-16 Putri">KU-16 Putri</option>
			<option value="KU-18 Putra">KU-18 Putra</option>
			<option value="KU-18 Putri">KU-18 Putri</option>
		</select>

<br>
<br>

	<!-- Tabel Official -->
	<h2>Official</h2>

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Posisi</th>
		</tr>
		
		
		<tr>
		<?php for ($i=1; $i <= 5 ; $i++) : ?>
			<td><?= $i ?></td>
			<td><input type="text" name="namaofficial[]"></td>
			<td>
				<select name="posisiofficial[]">
					<option value=""></option>
					<option value="Manager">Manager</option>
					<option value="Assistant Manager">Assistant Manager</option>
					<option value="Head Coach">Head Coach</option>
					<option value="Assistant Coach">Assistant Coach</option>
					<option value="Official">Official</option>
				</select>
			</td>
		</tr>
		<?php endfor ?>
	</table>



	<!-- Tabel Pemain -->
	<h2>Pemain</h2>

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kota kelahiran</th>
			<th>Tanggal lahir</th>
			<th>TB</th>
			<th>BB</th>
			<th>Posisi</th>
			<th>No punggung</th>
		</tr>
	
	
		<tr>
		<?php for ($i=1; $i <= 15 ; $i++) : ?>
			<td><?= $i ?></td>
			<td><input type="text" name="namapemain[]" value=""></td>
			<td><input type="text" name="kotapemain[]" value=""></td>
			<td><input type="text" name="tanggalpemain[]" value="" class="tanggallahir"></td>
			<td><input type="number" name="tinggipemain[]" value="" class="tinggiberat"></td>
			<td><input type="number" name="beratpemain[]" value="" class="tinggiberat"></td>
			
			<td>
				<select name="posisipemain[]">
					<option value=""></option>
					<option value="PG">PG</option>
					<option value="SG">SG</option>
					<option value="C">C</option>
					<option value="PF">PF</option>
					<option value="SF">SF</option>
				</select>
			</td>

			<td><input type="text" name="no_punggung[]" value=""></td>
		</tr>
		<?php endfor ?>
		
	</table>

<br>
<br>

	<button type="submit" name="daftar" >Submit</button>

	</form>

<script>
$(document).ready(function(){
	$('.tanggallahir').Zebra_DatePicker({
		view: 'years',
		current_date: '2001-01-01',
		direction: ['2001-01-01', '2014-12-31']
	});
});
</script>
</body>
</html>
<?php  

$conn = mysqli_connect("localhost", "root", "", "db_club");

$result = mysqli_query($conn,"SELECT * FROM tbl_tim WHERE KU = 'KU-16 Putra'");

echo "<title>Pool KLub</title>";

echo "<h2>Pool KU-16-Putra</h2>

<form action='proses_pool.php' method='GET'>
<table border='1' cellpadding='10' cellspacing='0'>
	<tr>
		<th>Pool</th>
		<th>Klub</th>
		</tr>

		
		<tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<td><input type='text' name='pool[]' value='".$row['pool']."'><input type='hidden' name='klubid[]' value='".$row['id']."'></td>
				<td>".$row['klub']."</td>
		</tr>";
		}
		
echo "</table>

		<br>

	<button type='submit'>Save</button>
  </form>";


?>
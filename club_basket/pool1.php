<?php

if (!$isloadfromindex) {
    include ("../../kelola/urasi.php");
    include ("../../kelola/fungsi.php");
    include ("../../kelola/lang/$lang/definisi.php");
    pesan(_ERROR, _NORIGHT);
}

$keyword = fiestolaundry($_GET['keyword'], 100);
$screen = fiestolaundry($_GET['screen'], 11);
$pid = fiestolaundry($_REQUEST['pid'], 11);

$judul = fiestolaundry($_POST['judul'], 200);
$isi = fiestolaundry($_POST['isi'], 0, TRUE);
$action = fiestolaundry($_REQUEST['action'], 10);

$modulename = $_GET['p'];

$q_ku=$mysql->query("SELECT distinct KU from tbl_tim WHERE status=1");
if($q_ku and $mysql->num_rows($q_ku)>0)
{
	while($d=$mysql->fetch_assoc($q_ku)){
		$KU[]=$d['KU'];
	}
}


if ($action=="save") {

	$pool = $_POST["pool"];
	$jumlah=count($pool);

	for($i=0;$i<$jumlah;$i++) {
		if (trim($_POST['pool'][$i])!='') {
			$sql = "UPDATE tbl_tim SET pool = '".strtoupper($_POST['pool'][$i])."' WHERE id ='".$_POST['klubid'][$i]."' ";
			$mysql->query($sql); 
		}

	}
	createnotification("Pool berhasil diupdate", "Berhasil", "info");
	$action="";
}


if($action=="") {
// pilih KU
$admincontent.='
	<form id="formKU" action="index.php?p=pool" method="POST">
		<select name="ku" id="ku" onchange="submitKU()">
			<option value="">(Pilih KU)</option>';
			foreach($KU as $i=> $value) { 
				$admincontent.='<option value="'.$value.'" '.($_POST["ku"]==$value ? 'selected="selected"':'').'>'.$value.'</option>';
			}
	$admincontent.='
		</select>

	</form>
	<script>
		function submitKU(){
			document.getElementById("formKU").submit();
		}
	</script>
';

if($_POST['ku']!="") {
	
	$result = $mysql->query("SELECT * FROM tbl_tim WHERE KU='".$_POST['ku']."' AND status='1' ORDER BY klub ASC");
	$admincontent.="
	<form action='index.php?p=pool&action=save' method='POST'>
	<input type='hidden' name='ku' value='".$_POST['ku']."' />
	<table border='1' cellpadding='10' cellspacing='0'>

	<tr>
		<th>Klub</th>
		<th>Pool</th>

	</tr>

		<tr>";
			while ($row = $mysql->fetch_assoc($result)) {

				$admincontent.="<td>".$row['klub']."</td>
				<td><input type='text' name='pool[]' value='".$row['pool']."'><input type='hidden' name='klubid[]' value='".$row['id']."'></td>
		</tr>";
		}
		
	$admincontent.="</table>
		<button type='submit' name='save'>Save</button>
	</form>";

	}
}


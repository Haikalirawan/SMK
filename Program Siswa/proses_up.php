<?php
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
// Create connection
$conn = mysqli_connect("localhost", "root", "", "db_siswa");
// Check connection
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function action($data){
	$data = str_replace('/', "", $data);
	$data = stripslashes($data);
	$data = addslashes($data);
	$data = str_replace('"', "", $data);

	return $data;
} 

$sql = "UPDATE tbl_data SET
							noreg = ".action($_POST['noreg']).",
							nama = '".action($_POST['nama'])."',
							alamat = '".action($_POST['alamat'])."',
							piljur = '".$_POST['jurusan']."',
							asal_sekolah = '".$_POST['asalsekolah']."',
							gender = '".$_POST['gender']."',
							agama = '".$_POST['agama']."'
			WHERE id = ".$_POST['id']."
			";

if (mysqli_query($conn, $sql)) {
	$_SESSION["message"] = "Data baru berhasil di update, Silahkan kembali ke Halaman utama";
	header("Location: data.php"); 
    echo "";
} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
		header("Location: data.php");
}

mysqli_close($conn);
?>
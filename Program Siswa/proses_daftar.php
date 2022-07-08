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

$sql = "INSERT INTO tbl_data (noreg,nama,alamat,asal_sekolah,gender,agama,piljur)
VALUES ('".action($_POST['noreg'])."', '".action($_POST['nama'])."', '".action($_POST['alamat'])."', '".$_POST['asalsekolah']."', '".$_POST['gender']."', '".$_POST['agama']."', '".$_POST['jurusan']."')";

if (mysqli_query($conn, $sql)) {
	$SESSION["message"] = "Data baru berhasil di buat, Silahkan kembali ke Halaman utama";
    header("Location: data.php");
} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
		header("Location: data.php");
}

mysqli_close($conn);
?>
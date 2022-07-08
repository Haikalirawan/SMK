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
	$data = stripslashes($data);
	$data = addslashes($data);
	$data = str_replace('"', "", $data);

	return $data;
} 

$sql = "INSERT INTO tbl_sekolah (asal_sekolah)
VALUES ('".action($_POST['sekolah'])."')";

if (mysqli_query($conn, $sql)) {
    echo "Data baru berhasil di buat, Silahkan kembali ke <a href='asalSek.php'>Halaman jurusan</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
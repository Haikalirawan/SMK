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

$sql = "UPDATE tbl_jurusan SET
							kode = '".action($_POST['kode'])."',
							jurusan = '".action($_POST['jurusan'])."'
			WHERE id = ".$_POST['id']."
			";

if (mysqli_query($conn, $sql)) {
    echo "Data baru berhasil di update, Silahkan kembali ke <a href='jurusan.php'>Halaman utama</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
// sesi
session_start();
// koneksi Dabes
$conn = mysqli_connect("localhost", "root", "", "db_siswa");
// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']);

// Query ke database
$query = mysqli_query($conn, "SELECT username,password FROM tbl_pengguna WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($query)===1) {
	$row = mysqli_fetch_assoc($query);
	$_SESSION["login"] = 1;
	$_SESSION["nama"] = $row["username"];
	header("Location: data.php");
	exit;
} else {
	echo "Username dan password salah, <a href='login.php'>silahkan login kembali</a>";
}

mysqli_close($conn);

 ?>
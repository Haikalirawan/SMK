<?php
session_start();
if(!$_SESSION["registrasi"]) {
  die('Anda harus <a href="registrasi.php">registrasi terlebih dahulu</a>');
}
// koneksi Dabes
$conn = mysqli_connect("localhost", "root", "", "db_siswa");
// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$password2 = $_POST['password2'];

if ($password != $password2) {
	echo "Silahkan <a href='registrasi.php'>Registrasi Ulang</a><br>";
	die("Maaf konfirmasi password salah!!");
}

$password = md5($password);

$sql = "INSERT INTO tbl_pengguna (username, password)
VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Data baru telah ditambahkan, Silahkan <a href='login.php'>Login</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
$conn = mysqli_connect("localhost", "root", "", "db_siswa");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
	// menyimpan data id di URL kedalam variabel
	$id = $_GET["id"];

	$query="DELETE from tbl_jurusan WHERE id = '$id'";

	if (mysqli_query($conn, $query)) {
		echo "Data berhasil dihapus, Silahkan kembali ke <a href='jurusan.php'>Halaman utama</a>";
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
} else {
    die("<script>
        alert('Akses dilarang oleh author'); 
        document.location.href = 'jurusan.php';
        </script>");
}

mysqli_close($conn);
 ?>
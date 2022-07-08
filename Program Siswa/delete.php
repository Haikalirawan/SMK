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
	// menyimpan data id kedalam variabel
$id = $_GET["id"];
// query SQL untuk insert data
$query="DELETE from tbl_data WHERE id = '$id'";

	if (mysqli_query($conn, $query)) {
		$_SESSION['message'] = "Data berhasil dihapus, Silahkan kembali ke Halaman utama";
		header("Location: data.php");
	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
		header("Location: data.php");
	}
} else {
	    die("<script>
        alert('Akses dilarang oleh author'); 
        document.location.href = 'data.php';
        </script>");
}

mysqli_close($conn);
 ?>
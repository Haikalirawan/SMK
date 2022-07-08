<?php 

$conn = mysqli_connect("localhost", "root", "", "db_siswa");
$username = $_POST["username"];
$password = md5($_POST["password"]);

$query = mysqli_query($conn, "SELECT username,password FROM tbl_pengguna WHERE username = '$username' AND password = '$password' ");

var_dump($username);

if (mysqli_num_rows($query)===1) {
	echo "Anda berhasil Sql injection";
} else {
	echo "Anda gagal melakukan sql injection";
}


mysqli_close($conn);

 ?>
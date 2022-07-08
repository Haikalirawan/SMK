<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "", "db_siswa");
    $result = mysqli_query($conn, "SELECT kode,agama FROM tbl_agama WHERE kode = $id ORDER BY agama ASC");
        while ($rows = mysqli_fetch_assoc($result)) {
            $row = $rows;
        }
} else{
    die("<script>
        alert('Silahkan pilih agama untuk diedit'); 
        document.location.href = 'agama.php';
        </script>");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu Update siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="bs-example">
    <h2>Update agama</h2>
    <form class="form-horizontal" action="proses_update_agama.php" method="POST">
    	<input type="hidden" name="id" value="<?php echo $row['kode']; ?>">
        <div class="form-group">
            <label class="control-label col-xs-2" for="agama">Agama: </label>
            <div class="col-xs-8">
                <input type="text" required name="agama" autocomplete="off" value="<?php echo $row['agama']; ?>" class="form-control" id="agama" placeholder="Nama agama baru" autofocus>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-8">
                <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </form>
</div>
</body>
</html>    
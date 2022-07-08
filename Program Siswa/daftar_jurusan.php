<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
$_SESSION["cek"] = "sudah";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu pendaftaran siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="data.php"><i class="fa fa-home fa-lg" style="color: #808080">&nbsp;</i>Pendaftran siswa</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="data.php">Siswa</a></li>
      <li class="active"><a href="jurusan.php">Jurusan</a></li>
      <li><a href="agama.php">Agama</a></li>
      <li><a href="asalSek.php">Asal sekolah</a></li>
      <li><a href="cetak.php">Cetak</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-lg" style="color: #808080">&nbsp;</i>You logged as <?php echo $_SESSION["nama"]; ?></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-lg" style="color: #808080">&nbsp;</i>Logout</a></li>
      </ul>
    </div> <!-- div milik collapse  --> 
  </div> <!-- div milik container  --> 
</nav>

<div class="container" style="margin-top: 55px;">
<div class="row">
<div class="bs-example">
    <h2>Daftar jurusan baru</h2>
    <form class="form-horizontal" action="proses_tambah_jurusan.php" method="POST">
        <div class="form-group">
            <label class="control-label col-xs-2" for="Kode_jurusan">Kode jurusan: </label>
            <div class="col-xs-8">
                <input type="text" required autocomplete="off" name="kode" class="form-control" id="Kode_jurusan" placeholder="Kode jurusan baru" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="Jurusan">Jurusan: </label>
            <div class="col-xs-8">
                <input type="text" required autocomplete="off" name="jurusan" class="form-control" id="Jurusan" placeholder="Jurusan baru" autofocus>
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
</div>
</div>
</body>
</html>    
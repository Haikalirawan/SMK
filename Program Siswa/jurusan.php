<?php 
session_start();
if (!$_SESSION["login"]) {
  die("Anda harus <a href='login.php'>Login</a>");
}
$conn = mysqli_connect("localhost", "root", "", "db_siswa");
$result = mysqli_query($conn, "SELECT id,kode,jurusan FROM tbl_jurusan ORDER BY jurusan ASC");

// Pencarian (query setelah search)
if (isset($_POST["search"])) {
  $keyword = $_POST['keyword'];
  $result = mysqli_query($conn, "SELECT id,kode,jurusan FROM tbl_jurusan WHERE jurusan LIKE '%$keyword%' ORDER BY jurusan ASC");
}

$row = [];
while ($rows = mysqli_fetch_assoc($result)) {
  $row[] = $rows;
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu pendaftaran siswa</title>
    <link rel="stylesheet" href="text/css" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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


    <!-- Data web -->
    <div class="container" style="margin-top: 150px;">
      <div class="row">
        <div class="table table-hover">
<br>
<br>
          <a href="daftar_jurusan.php" class="tambah_data"><i class="fa fa-bookmark fa-lg" style="color: white">&nbsp;&nbsp;</i>Tambah jurusan</a>
          
          <!-- Searching -->
          <form class="example" action="" method="POST">
            <input type="text" autofocus placeholder="Search.." name="keyword" style="padding: 7px; font-size: 15px; border: 1px solid #e6e6e6; width: 250px; background: #f1f1f1;">
            <button type="submit" value="search" name="search" style="width: 50px; padding: 7px; background: #009933; color: white; font-size: 15px; border: 1px solid #e6e6e6; border-left: none; cursor: pointer;"><i class="fa fa-search"></i></button>
          </form>
<br>

          <!-- Data Pada Tabel -->
          <table class="table table-bordered table-striped table-hover">
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Action</th>       
              </tr>

              <tr>
              <?php $j = 1 ?>
              <?php foreach ($row as $key): ?>
                <td class="text-center"><?php echo $j; ?></td>
                <td><?php echo $key["jurusan"]; ?></td>
                <td class="text-center">
                  <a href="update_jurusan.php?id=<?php echo $key['id'] ?>"><i class="fa fa-edit fa-2x" style="color: #51cf66;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="delete_jurusan.php?id=<?php echo $key['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus??')"><i class="fa fa-trash fa-2x" style="color: #ff6b6b;"></i></a>
                </td>
              </tr>
              <?php $j++ ?>
              <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
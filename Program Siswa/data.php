<?php 
session_start();
if(!$_SESSION["login"]) {
  die('Anda harus <a href="login.php">Login terlebih dahulu</a>');
}
// koneksi dabes
$conn = mysqli_connect("localhost", "root", "", "db_siswa");

// Kelola Pagination
$Dataperhalaman = 10;
$query = mysqli_query($conn,"SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data");
$Jumlahdata = mysqli_num_rows($query);
$Jumlahhalaman = ceil($Jumlahdata / $Dataperhalaman);
$Halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$Awaldata = ($Halamanaktif *  $Dataperhalaman) - $Dataperhalaman;
$posisi = ($Halamanaktif - 1) * $Dataperhalaman;
if ($Halamanaktif == '') {
  die("<script>
      alert('Harap masukkan data halaman dengan benar');
      document.location.href = 'data.php?halaman=1';
    </script>");
}

// query awal
$result = mysqli_query($conn, "SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data ORDER BY nama ASC LIMIT $Awaldata, $Dataperhalaman");

// Pencarian (query setelah search)
if (isset($_POST["search"])) {
  $keyword = $_POST['keyword'];
  $keyword = addslashes($keyword);
  $Dataperhalaman = 10;
  $query = mysqli_query($conn,"SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data WHERE noreg LIKE '%$keyword%' OR nama LIKE  '%$keyword%'");
  
  $Jumlahdata = mysqli_num_rows($query);
  $Jumlahhalaman = ceil($Jumlahdata / $Dataperhalaman);
  $Halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $Awaldata = ($Halamanaktif *  $Dataperhalaman) - $Dataperhalaman;
  $posisi = ($Halamanaktif - 1) * $Dataperhalaman;
if ($Halamanaktif == '') {
  die("<script>
      alert('Harap masukkan data halaman dengan benar');
      document.location.href = 'cetak.php?halaman=1';
    </script>");
}


  $result = mysqli_query($conn, "SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data WHERE noreg LIKE '%$keyword%' OR
                                                                                                           nama LIKE  '%$keyword%'
  ORDER BY nama ASC LIMIT $Awaldata, $Dataperhalaman");
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
      <li class="active"><a href="data.php">Siswa</a></li>
      <li><a href="jurusan.php">Jurusan</a></li>
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
<?php $_SESSION["message"]; ?>
<div class="<?php echo $_SESSION['message']; ?>"></div>
    <div class="container" style="margin-top: 150px;">
      <div class="row">
        <div class="table table-hover">
<br>
<br>
          <a href="daftar1.php" class="tambah_data"><i class="fa fa-user-plus fa-lg" style="color: white">&nbsp;&nbsp;</i>Daftar siswa</a>
          
          <!-- Searching -->
          <form class="example" action="" method="POST">
            <input type="text" autofocus placeholder="Cari data..." name="keyword" style="padding: 7px; font-size: 15px; border: 1px solid #e6e6e6; width: 250px; background: #f1f1f1;">
            <button type="submit" value="search" name="search" style="width: 50px; padding: 7px; background: #009933; color: white; font-size: 15px; border: 1px solid #e6e6e6; border-left: none; cursor: pointer;"><i class="fa fa-search"></i></button>
          </form>
<br>

          <!-- Data Pada Tabel -->
          <table class="table table-bordered table-striped table-hover">
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">No registrasi</th>
                <th class="text-center">Nama</th> 
                <th class="text-center">Alamat</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Action</th>       
              </tr>

              <tr>
              <?php $no = 1 + $posisi?>
              <?php foreach ($row as $key): ?>
                <td><?php echo $no; ?></td>
                <td><?php echo $key["noreg"]; ?></td>
                <td><?php echo $key["nama"]; ?></td>
                <td><?php echo $key["alamat"]; ?></td>
                <td><?php echo $key["piljur"]; ?></td>
                <td class="text-center">
                  <a href="update1.php?id=<?php echo $key['id'] ?>"><i class="fa fa-edit fa-2x" style="color: #51cf66;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="delete.php?id=<?php echo $key['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus??')"><i class="fa fa-trash fa-2x" style="color: #ff6b6b;"></i></a>
                </td>
              </tr>
              <?php $no++ ?>
              <?php endforeach ?>
          </table>
        </div>

        <div style="position: relative; width: 80%; margin: 0 auto; text-align: center; margin-top: 20px;">
        <ul class="pagination">

          <?php if ($Halamanaktif > 1): ?>
            <li class="left-etc"><a href="data.php?halaman=<?php echo 1; ?>">&laquo;</a></li>
            <li class="left-etc"><a href="data.php?halaman=<?php echo $Halamanaktif - 1; ?>">&lt;</a></li>
          <?php endif ?>


            <?php for ($i=1; $i<=$Jumlahhalaman; $i++) : ?>
              <?php if ($i == $Halamanaktif): ?>
                <li class="active">
                  <a href="data.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php else: ?>
                  <li><a href="data.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php endif ?>
            <?php endfor ?>


            <?php if ($Halamanaktif < $Jumlahhalaman): ?>
              <li><a href="data.php?halaman=<?php echo $Halamanaktif + 1 ?>">&gt;</a></li>
              <li class="left-etc"><a href="data.php?halaman=<?php echo $Jumlahhalaman; ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php $_SESSION["message"]='' ?>
<?php 
session_start();
if (!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login terlebih dahulu</a>');
} 
// koneksi dabes
$conn = mysqli_connect("localhost", "root", "", "db_siswa");

// Kelola Pagination
$Dataperhalaman = 5;
$query = mysqli_query($conn, "SELECT * FROM tbl_data");
$Jumlahdata = mysqli_num_rows($query);
$Jumlahhalaman = ceil($Jumlahdata / $Dataperhalaman);
$Halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$Awaldata = ($Halamanaktif * $Dataperhalaman) - $Dataperhalaman;
$posisi = ($Halamanaktif - 1) * $Dataperhalaman;
if ($Halamanaktif == '') {
  die("<script>
      alert('Harap masukkan data halaman dengan benar');
      document.location.href = 'cetak.php?halaman=1';
    </script>");
}



// query untuk cetak
$result = mysqli_query($conn, "SELECT DISTINCT a.nama, a.noreg, j.jurusan, s.asal_sekolah, b.agama FROM tbl_data AS a
                                        LEFT JOIN tbl_jurusan AS j ON a.piljur = j.kode
                                        LEFT JOIN tbl_sekolah AS s ON a.asal_sekolah = s.kode
                                        LEFT JOIN tbl_agama AS b ON a.agama = b.kode
                                        ORDER BY a.nama ASC LIMIT $Awaldata, $Dataperhalaman");

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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="pagination.js"></script>
    <script src="responsive-paginate.js"></script>
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
      <li><a href="jurusan.php">Jurusan</a></li>
      <li><a href="agama.php">Agama</a></li>
      <li><a href="asalSek.php">Asal sekolah</a></li>
      <li class="active"><a href="cetak.php">Cetak</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user fa-lg" style="color: #808080">&nbsp;</i>You logged as <?php echo $_SESSION["nama"]; ?></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-lg" style="color: #808080">&nbsp;</i>Logout</a></li>
      </ul>
    </div> <!-- div milik collapse  --> 
  </div> <!-- div milik container  --> 
</nav>


    <div class="container" style="margin-top: 75px;">
      <div class="row">
        <div class="table table-hover">
    	<h2>Daftar seluruh siswa</h2>
        	<!-- Data Pada Tabel -->
          <table class="table table-bordered table-striped table-hover">
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">No registrasi</th>
                <th class="text-center">Nama</th> 
                <th class="text-center">Jurusan</th>
                <th class="text-center">Asal sekolah</th>  
                <th class="text-center">Agama</th>     
              </tr>

              <tr>
              <?php $no = 1 + $posisi ?>
              <?php foreach ($row as $key) : ?>
                <td><?php echo $no; ?></td>
                <td><?php echo $key["noreg"]; ?></td>
                <td><?php echo $key["nama"]; ?></td>
                <td><?php echo $key["jurusan"]; ?></td>
                <td><?php echo $key["asal_sekolah"]; ?></td>
                <td><?php echo $key["agama"]; ?></td>
              </tr>
              <?php $no++ ?>
              <?php endforeach ?>
          </table>
      </div>

      <div style="position: relative; width: 80%; margin: 0 auto; text-align: center; margin-top: 20px;">
        <ul class="pagination">

          <?php if ($Halamanaktif > 1) : ?>
            <li class="left-etc"><a href="cetak.php?halaman=<?php echo 1; ?>">&laquo;</a></li>
            <li class="left-etc"><a href="cetak.php?halaman=<?php echo $Halamanaktif - 1; ?>">&lt;</a></li>
          <?php endif ?>


            <?php for ($i = 1; $i <= $Jumlahhalaman; $i++) : ?>
              <?php if ($i == $Halamanaktif) : ?>
                <li class="active">
                  <a href="cetak.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php else : ?>
                  <li><a href="cetak.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php endif ?>
            <?php endfor ?>


            <?php if ($Halamanaktif < $Jumlahhalaman) : ?>
              <li><a href="cetak.php?halaman=<?php echo $Halamanaktif + 1 ?>">&gt;</a></li>
              <li class="left-etc"><a href="cetak.php?halaman=<?php echo $Jumlahhalaman; ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
  </div>
</div>
</body>
</html>
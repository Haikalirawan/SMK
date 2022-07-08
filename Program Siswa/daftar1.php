<?php 
// koneksi dabes
$conn = mysqli_connect("localhost", "root", "", "db_siswa");

// query untuk cetak
// $result = mysqli_query($conn, "SELECT DISTINCT a.nama, j.jurusan, s.asal_sekolah, b.agama FROM tbl_data AS a
//                                         LEFT JOIN tbl_jurusan AS j ON a.piljur = j.kode
//                                         LEFT JOIN tbl_sekolah AS s ON a.asal_sekolah = s.asal_sekolah
//                                         LEFT JOIN tbl_agama AS b ON a.agama = b.agama");
$result_jurusan = mysqli_query($conn, "SELECT id,kode,jurusan FROM tbl_jurusan ORDER BY kode ASC");
$result_sekolah = mysqli_query($conn, "SELECT kode,asal_sekolah FROM tbl_sekolah ORDER BY asal_sekolah ASC");
$result_agama = mysqli_query($conn, "SELECT kode,agama FROM tbl_agama");

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


<div class="container" style="margin-top: 55px;">
<div class="row">
<div class="bs-example">
    <h2>Daftar siswa</h2>
    <form class="form-horizontal" action="proses_daftar.php" method="POST">
        <div class="form-group">
            <label class="control-label col-xs-2" for="noreg">No registrasi: </label>
            <div class="col-xs-8">
                <input type="text" required autocomplete="off" name="noreg" class="form-control" id="noreg" placeholder="No registrasi" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="Nama">Nama: </label>
            <div class="col-xs-8">
                <input type="text" required name="nama" class="form-control" id="Nama" placeholder="Nama Anda">
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-xs-2" for="Alamat">Alamat: </label>
            <div class="col-xs-8">
                <textarea rows="5" cols="30" class="form-control" name="alamat" id="Alamat" placeholder="Masukan Alamat Lengkap"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Pilih jurusan: </label>
            <div class="col-xs-5">
                <select class="form-control" name="jurusan">
                    <option>--- Pilih jurusan ---</option>
                <?php while ($row = mysqli_fetch_assoc($result_jurusan)) : ?>
                    <option value="<?php echo $row['kode'] ?>"><?php echo $row['jurusan'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Asal sekolah: </label>
            <div class="col-xs-5">
                <select class="form-control" name="asalsekolah">
                    <option>--- Asal sekolah ---</option>
                <?php while ($row = mysqli_fetch_assoc($result_sekolah)) : ?>
                    <option value="<?php echo $row['kode'] ?>"><?php echo $row['asal_sekolah'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Agama: </label>
            <div class="col-xs-5">
                <select class="form-control" name="agama">
                    <option>--- Pilih Agama ---</option>
                <?php while ($row = mysqli_fetch_assoc($result_agama)) : ?>
                    <option value="<?php echo $row['kode'] ?>"><?php echo $row['agama'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Jenis kelamin: </label>
            <div class="col-xs-5">
                <select class="form-control" name="gender">
                    <option>--- Jenis kelamin ---</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-xs-2"></label>
            <div class="col-xs-5">
               <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </form>
</div>
</div>
</div>
</body>
</html>    
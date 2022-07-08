<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "", "db_siswa");
    $result = mysqli_query($conn, "SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data WHERE id = $id ORDER BY nama ASC");
    $result_jurusan = mysqli_query($conn, "SELECT id,kode,jurusan FROM tbl_jurusan ORDER BY kode ASC");
    $result_sekolah = mysqli_query($conn, "SELECT kode,asal_sekolah FROM tbl_sekolah ORDER BY asal_sekolah ASC");
    $result_agama = mysqli_query($conn, "SELECT kode,agama FROM tbl_agama");

    while ($rowo = mysqli_fetch_assoc($result)) {
      $row = $rowo;
    }

} else{
    die("<script>
        alert('Silahkan pilih siswa untuk diedit'); 
        document.location.href = 'data.php';
        </script>");
}

// function active_radio_button($value,$input){
//     // apabila value dari radio sama dengan yang di input
//     $result =  $value==$input?'checked':'';
//     return $result;
// }

function active_dropbox($v,$i){
    // apabila value dari dropbox sama dengan yang di input
    $r =  $v==$i?'selected="selected"':'';
    return $r;
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
    <h2>Update data siswa</h2>
    <form class="form-horizontal" action="proses_up.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label class="control-label col-xs-2" for="noreg">No registrasi: </label>
            <div class="col-xs-8">
                <input type="text" required autocomplete="off" value="<?php echo $row['noreg']; ?>" name="noreg" class="form-control" id="noreg" placeholder="No registrasi" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="Nama">Nama: </label>
            <div class="col-xs-8">
                <input type="text" required name="nama" value="<?php echo $row['nama']; ?>" class="form-control" id="Nama" placeholder="Nama Anda">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="Alamat">Alamat: </label>
            <div class="col-xs-8">
                <textarea rows="5" cols="30" class="form-control" name="alamat" id="Alamat" placeholder="Masukan Alamat Lengkap"><?php echo $row['alamat']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Pilih jurusan: </label>
            <div class="col-xs-5">
                <select class="form-control" name="jurusan">
                    <option>--- Pilih jurusan ---</option>
                <?php while ($rows = mysqli_fetch_assoc($result_jurusan)) :  ?>
                    <option value="<?php echo $rows['kode'] ?>" <?php echo active_dropbox($rows['kode'], $row['piljur']) ?>> <?php echo $rows['jurusan'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Asal sekolah: </label>
            <div class="col-xs-5">
                <select class="form-control" name="asalsekolah">
                    <option>--- Asal sekolah ---</option>
                <?php while ($rows = mysqli_fetch_assoc($result_sekolah)) :  ?>
                    <option value="<?php echo $rows['kode'] ?>" <?php echo active_dropbox($rows['kode'], $row['asal_sekolah']) ?>> <?php echo $rows['asal_sekolah'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Agama: </label>
            <div class="col-xs-5">
                <select class="form-control" name="agama">
                    <option>--- Pilih Agama ---</option>
                <?php while ($rows = mysqli_fetch_assoc($result_agama)) :  ?>
                    <option value="<?php echo $rows['kode'] ?>" <?php echo active_dropbox($rows['kode'], $row['agama']) ?>> <?php echo $rows['agama'] ?></option>
                <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Jenis kelamin: </label>
            <div class="col-xs-5">
                <select class="form-control" name="gender">
                    <option>--- Jenis kelamin ---</option>
                    <option value="Pria" <?php echo active_dropbox("Pria", $row['gender'])?>>Pria</option>
                    <option value="Wanita" <?php echo active_dropbox("Wanita", $row['gender'])?>>Wanita</option>
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
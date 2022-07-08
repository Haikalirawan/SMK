<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
} ?>

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
</head>
<body>
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
            <label class="control-label col-xs-2" for="Jurusan">Pilihan jurusan: </label>
            <div class="col-xs-8">
                <input type="text" required name="jurusan" class="form-control" id="Jurusan" placeholder="Jurusan Anda">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="asalSekolah">Asal sekolah: </label>
            <div class="col-xs-8">
                <input type="text" required name="asalsekolah" class="form-control" id="asalSekolah" placeholder="Asal sekolah anda">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Gender: </label>
            <div class="col-xs-5">
                <select class="form-control" name="gender">
                    <option>--- Jenis kelamin ---</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Agama: </label>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Islam"> Islam
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Kristen"> Kristen
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Katholik"> Katholik
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Hindu"> Hindu
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Buddha"> Buddha
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Konghucu"> Konghucu
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Lain-lain"> Lain-lain
                </label>
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
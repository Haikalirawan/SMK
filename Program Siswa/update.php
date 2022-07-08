<?php 
session_start();
if(!$_SESSION["login"]) {
  die('anda harus <a href="login.php">Login</a>');
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conn = mysqli_connect("localhost", "root", "", "db_siswa");
    $result = mysqli_query($conn, "SELECT id,noreg,nama,alamat,asal_sekolah,gender,agama,piljur FROM tbl_data WHERE id = $id ORDER BY nama ASC");
    while ($rows = mysqli_fetch_assoc($result)) {
      $row = $rows;
        }
} else{
    die("<script>
        alert('Silahkan pilih siswa untuk diedit'); 
        document.location.href = 'data.php';
        </script>");
}

function active_radio_button($value,$input){
    // apabila value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}

function active_dropbox($v,$i){
    // apabila value dari dropbox sama dengan yang di input
    $r =  $v == $i ? 'selected="selected"':'';
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
</head>
<body>
<div class="bs-example">
    <h2>Update data siswa</h2>
    <form class="form-horizontal" action="proses_up.php" method="POST">
    	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label class="control-label col-xs-2" for="noreg">No registrasi: </label>
            <div class="col-xs-8">
                <input type="text" required name="noreg" autocomplete="off" value="<?php echo $row['noreg']; ?>" class="form-control" id="noreg" placeholder="No registrasi" autofocus>
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
            <label class="control-label col-xs-2" for="Jurusan">Pilihan jurusan: </label>
            <div class="col-xs-8">
                <input type="text" required name="jurusan" value="<?php echo $row['piljur']; ?>" class="form-control" id="Jurusan" placeholder="Jurusan Anda">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="asalSekolah">Asal sekolah: </label>
            <div class="col-xs-8">
                <input type="text" required value="<?php echo $row['asal_sekolah']; ?>" name="asalsekolah" class="form-control" id="asalSekolah" placeholder="Asal sekolah">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Gender: </label>
            <div class="col-xs-5">
                <select class="form-control" name="gender">
                    <option>--- Jenis kelamin ---</option>
                    <option value="Pria" <?php echo active_dropbox("Pria", $row['gender'])?>>Pria</option>
                    <option value="Wanita" <?php echo active_dropbox("Wanita", $row['gender'])?>>Wanita</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Agama: </label>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Islam" <?php echo active_radio_button("Islam", $row['agama'])?>> Islam
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Kristen" <?php echo active_radio_button("Kristen", $row['agama'])?>> Kristen
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Katholik" <?php echo active_radio_button("Katholik", $row['agama'])?>> Katholik
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Hindu" <?php echo active_radio_button("Hindu", $row['agama'])?>> Hindu
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Buddha" <?php echo active_radio_button("Buddha", $row['agama'])?>> Buddha
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Konghucu" <?php echo active_radio_button("Konghucu", $row['agama'])?>> Konghucu
                </label>
            </div>
            <div class="col-xs-1">
                <label class="radio-inline">
                    <input type="radio" name="agama" value="Lain-lain" <?php echo active_radio_button("Lain-lain", $row['agama'])?>> Lain-lain
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
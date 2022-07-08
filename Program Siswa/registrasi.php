<?php 
// sesi
session_start();
$_SESSION["registrasi"] = "regis";
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="kotak_login">
    <p class="tulisan_login">Silahkan Registrasi</p>
 
    <form action="proses_registrasi.php" method="POST">
      <input type="text" id="username" name="username" class="form_login" placeholder="Isi username..." autofocus autocomplete="off" title="Silahkan isi username anda.." required>
 
      <input type="password" id="password" name="password" class="form_login" placeholder="Isi password..." autocomplete="off" title="Silahkan isi password anda.." required>

      <input type="password" id="password2" name="password2" class="form_login" placeholder="Konfirmasi password..." autocomplete="off" title="Konfirmasi password anda.." required>
 
      <button type="submit" class="tombol_login" name="daftar">DAFTAR</button>
 
      <br>
      <br>

      <center>
        <p class="message">Sudah terdaftar? <a href="login.php">Login sekarang</a></p>
      </center>
    </form>
    
  </div>
 
</body>
</html>
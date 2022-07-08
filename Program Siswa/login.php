<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="proses_login1.php" method="POST">
			<input type="text" name="username" class="form_login" placeholder="Masukkan username..." autofocus autocomplete="off" title="Masukkan username anda.." required>
 
			<input type="password" name="password" class="form_login" placeholder="Masukkan Password..." autocomplete="off" title="Masukkan password anda.." required>
 
			<button type="submit" class="tombol_login" name="login">LOGIN</button>
 
			<br>
			<br>

			<center>
				<p class="message">Belum terdaftar? <a href="registrasi.php">Daftar disini</a></p>
			</center>
		</form>
		
	</div>
 
</body>
</html>
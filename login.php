<?php

include './config/koneksi-db.php';

if (!isset($_POST['kirim'])) {
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Admin | Sistem Informasi Perpustakaan</title>
		<link rel="stylesheet" href="./assets/css/login.css">
	</head>

	<body>
		<div id="wrapper">
			<div id="form-area">
				<header>
					<img src="./assets/img/logo.png" width="80">
					<h1>Sistem Informasi Perpustakaan</h1>
					<h3>Login Admin</h3>
				</header>
				<div id="container">
					<form action="" method="post">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" required>

						<label for="password">Password</label>
						<input type="password" name="password" id="password" required>

						<input type="submit" name="kirim" id="password" value="Kirim">
					</form>
				</div>
				<footer>
					<p><?php echo "VSGA 2021"; ?></p>
				</footer>
			</div>
		</div>
	</body>

	</html>

<?php
} else {
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM `admin` WHERE `username` = '{$username}'";
	$query = mysqli_query($db_conn, $sql);

	if ($query->num_rows > 0) {


		$data = mysqli_fetch_array($query);

		
			$_SESSION['idadmin'] = $data['idadmin'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nm_admin'] = $data['nm_admin'];

			// echo '<pre>';
			// var_dump($_SESSION);
			// echo '</pre>';

			echo "<script>alert('Login Berhasil!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		
	} else {
		echo "<script>alert('Login Gagal!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}
}
?>
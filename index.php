<?php
	include './config/koneksi-db.php';
	session_start();
	$_QUERY_LIMIT = 5;
	if(isset($_SESSION['nm_admin'])){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perpustakaan</title>
		<link rel="stylesheet" href="./assets/vendor/bootstrap-4.3/css/bootstrap.min.css" />
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<?php
		include './app/layout/header.php';
		include './app/layout/sidebar-menu.php';
		?>
				<div id="content">
					<?php
				
					$app_dir = 'app';
					$p = ''; 
					if(isset($_GET['p'])) { 
					$p = $_GET['p'];
					}
					
					if(!empty($p)) {
					$file = $app_dir . '/' . $p . '.php';
					if(file_exists($file)) { 
					include $file;
					} else {
					include $app_dir . '/404.php';
					}
					} else {
					include $app_dir . '/beranda.php';
					}
					?>
				</div>
			</div>
		</section>
	</body>
	<?php
		include './app/layout/footer.php'
		?>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<?php
}
else{
	echo"<script>
		alert('Anda Harus Login Dahulu');
		</script>";
		header('location:login.php');
}
?>

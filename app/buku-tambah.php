<?php
include './config/koneksi-db.php';

/* Kondisi jika tidak melakukan simpan/ submit, maka tampilkan formulir */
if (!isset($_POST['simpan'])) {
	/* Mempersiapkan ID Anggota Baru */
	$sql = "SELECT id_buku FROM buku;";
	$query = mysqli_query($db_conn, $sql);
	$row = $query->num_rows;

	$id_buku_tmp = $row + 1; // Menambahkan +1 untuk ID Anggota Baru
	$id_buku_tmp = str_pad($id_buku_tmp, 3, "0", STR_PAD_LEFT); // Menambahkan "0" sampai panjang 3 digit termasuk ID Anggota Baru
	$id_buku_tmp = 'BK' . $id_buku_tmp; // Menambahkan prefix 'AG' untuk ID Anggota Baru

	// get semua kategori
	$kategori_sql = "SELECT * from kategori";
	$data_kategori = mysqli_query($db_conn, $kategori_sql);

	// get semua penulis
	$penulis_sql = "SELECT * from penulis";
	$data_penulis = mysqli_query($db_conn, $penulis_sql);

	// get semua penerbit
	$penerbit_sql = "SELECT * from penerbit";
	$data_penerbit = mysqli_query($db_conn, $penerbit_sql);
?>

	<div id="container">
		<div class="page-title">
			<h3>Tambah Data Buku</h3>
		</div>
		<div class="page-content">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="form-table">
					<tr>
						<td>
							<label for="id_buku">ID Buku</label>
						</td>
						<td>
							<input type="text" name="id_buku" id="id_buku" value="<?php echo $id_buku_tmp; ?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<label for="judul_buku">Judul Buku</label>
						</td>
						<td>
							<input type="text" name="judul_buku" id="nama_lengkap" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_kategori">ID Kategori</label>
						</td>
						<td>
							<select name="id_kategori" id="id_kategori">
								<option disabled selected> Pilih </option>
								<?php while ($kategori = mysqli_fetch_assoc($data_kategori)) { ?>
									<option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_penulis">ID Penulis</label>
						</td>
						<td>
							<select name="id_penulis" id="id_penulis">
								<option disabled selected> Pilih </option>
								<?php while ($penulis = mysqli_fetch_assoc($data_penulis)) { ?>
									<option value="<?= $penulis['id_penulis'] ?>"><?= $penulis['nama_penulis'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="id_penerbit">ID Penerbit</label>
						</td>
						<td>
							<select name="id_penerbit" id="id_penerbit">
								<option disabled selected> Pilih </option>
								<?php while ($penerbit = mysqli_fetch_assoc($data_penerbit)) { ?>
									<option value="<?= $penerbit['id_penerbit'] ?>"><?= $penerbit['nama_penerbit'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
						<td>
							<input type="submit" name="simpan" value="Simpan">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

<?php
} else {
	/* Proses Penyimpanan Data dari Form */

	$id_buku 		= $_POST['id_buku'];
	$judul_buku 	= $_POST['judul_buku'];
	$id_kategori	= $_POST['id_kategori'];
	$id_penulis		= $_POST['id_penulis'];
	$id_penerbit	= $_POST['id_penerbit'];
	$status	= 'Tersedia';

	// Query
	$sql = "INSERT INTO buku 
				VALUES('{$id_buku}', 
						'{$judul_buku}', 
						'{$id_kategori}', 
						'{$id_penulis}',
						'{$id_penerbit}',
						'{$status}')";
	$query = mysqli_query($db_conn, $sql);

	// mengalihkan halaman
	echo "<meta http-equiv='refresh' content='0; url=index.php?p=buku'>";
}
?>
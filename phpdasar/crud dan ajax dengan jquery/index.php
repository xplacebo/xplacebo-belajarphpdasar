<?php

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
// order by untuk meanmpilkan sesuai yang mana disitu id
// asc menampilkan yang lama di atas
// desc menampilkan yang baru di atas

// tombol pencarian
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

// ambil data mahasiswa dari objek result
// mysqli_fect_row() // array numerik
// mysqli_fect_assoc() // array assosiative
// mysqli_fect_array() // megembalikan
// mysqli_fect_object()

// while ($mhs = mysqli_fetch_assoc($result)) {
// 	var_dump($mhs);
// }



// tombol cari di tekan
if (isset($_POST['cari'])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
	<style>
		img {
			width: 60px;
		}

		.loader {
			width: 40px;
			position: absolute;
			top: 105px;
			display: none;
		}
	</style>
</head>

<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Data Mahasiswa</a><br><br>
	<form action="" method="POST">
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari!</button>
		<img class="loader" src="img/Spinner.gif" alt="">
	</form><br>
	<div id="container">
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No. </th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i = 1;
		foreach ($mahasiswa as $row) : ?>

			<tr>
				<td><?php echo $i++; ?></td>
				<td>
					<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin data di hapus');">Hapus</a>
				</td>
				<td><img src="img/<?php echo $row["gambar"]; ?>" alt=""></td>
				<td><?php echo $row["nrp"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	</div>

</body>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</html>
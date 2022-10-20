<!DOCTYPE html>
<html>
	<head>
		<title>TUGAS PEMOGRAMAN 3</title>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$nama = $_POST['nama'];
			$password = $_POST['password'];
			$level = $_POST['level'];
			$status = $_POST['status'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into user values('','$nama','$password','$level','$status')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:user.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	
	?>
	<body>
		<h2>DATA USER</h2>
		<br/>
		<a href="index.php">KEMBALI</a>
		<br/>
		<br/>
		<h3>TAMBAH DATA USER</h3>
		<form method="POST">
			<table>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>Level</td>
					<td>
						<select name="level">
							<option value="">-----Pilih</option>
							<option value="1">Admin</option>
							<option value="2">Staff</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						<select name="status">
							<option value="">-----Pilih</option>
							<option value="1">Aktif</option>
							<option value="2">Tidak Aktif</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
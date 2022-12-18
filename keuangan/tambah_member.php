<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$nama_member = $_POST['nama_member'];
			$alamat_member = $_POST['alamat_member'];
			$id_level = $_POST['id_level'];
			$status = $_POST['status'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into member values('','$nama_member','$alamat_member','$id_level','$status')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:member.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	
		$querylevel = "SELECT * FROM level
						LEFT JOIN tipe on level.id_tipe = tipe.id_tipe
						WHERE tipe.nama_tipe = 'Member'
						";
		$resultlevel = mysqli_query ($koneksi,$querylevel);
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="member.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA MEMBER</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama_member">Nama Member</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="nama_member">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="alamat_member">Alamat Member</label>
					<div class="col-sm-5">
						<input type="textarea" class="form-control" name="alamat_member">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_level">Level</label>
					<div class="col-sm-5">
						<select class="form-control" name="id_level" id="id_level">
							<option value="">-----Pilih Level-----</option>
								<?php
									while ($datalevel=mysqli_fetch_array($resultlevel))
									{
										echo "<option value=$datalevel[id_level]>$datalevel[nama_level]</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="status">Status</label>
					<div class="col-sm-5">
						<select class="form-control" name="status" id="status">
							<option value="">-----Pilih Status-----</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<input type="submit" name="save" class="btn btn-danger">
			</form>		
		</div>
	</body>
</html>
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
			$diskon = $_POST['diskon'];
            $id_level = $_POST['id_level'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into diskon values('','$diskon','$id_level')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:diskon.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}
		
        $querylevel = "SELECT * FROM level where id_tipe='2'";
		$resultlevel = mysqli_query ($koneksi,$querylevel);
		
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="diskon.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA DISKON</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="diskon">Nilai Diskon</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="diskon">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_level">Level</label>
					<div class="col-sm-5">
						<select class="form-control" name="id_level" id="id_level">
							<option value="">-----Pilih LEVEL-----</option>
								<?php
									while ($datalevel=mysqli_fetch_array($resultlevel))
									{
										echo "<option value=$datalevel[id_level]>$datalevel[nama_level]</option>";
									}
								?>
						</select>
					</div>
				</div>
				<input type="submit" name="save" class="btn btn-danger">
			</form>		
		</div>
	</body>
</html>
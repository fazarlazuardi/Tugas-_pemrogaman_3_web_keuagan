<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/jquery.js"></script>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$tgl_transaksi = $_POST['tgl_transaksi'];
			$no_transaksi = $_POST['no_transaksi'];
			$jenis_transaksi = $_POST['jenis_transaksi'];
			$barang_id = $_POST['barang_id'];
			$diskon_member = $_POST['diskon_member'];
			$diskon_barang = $_POST['diskon_barang'];
			$total_pembelian = $_POST['total_pembelian'];
			$total_diskon = $_POST['total_diskon'];
			$jumlah_transaksi = $_POST['jumlah_transaksi'];
			$id_member = $_POST['id_member'];

			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into transaksi values('','$tgl_transaksi','$no_transaksi','$jenis_transaksi','$barang_id','$diskon_member','$diskon_barang','$total_pembelian','$total_diskon','$jumlah_transaksi','$id_member')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:transaksi.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	

		$querybarang = "SELECT * FROM barang";
		$resultbarang = mysqli_query ($koneksi,$querybarang); 

		$querymember = "SELECT * FROM member
						LEFT JOIN level on level.id_level = member.id_level
						LEFT JOIN diskon on diskon.id_level = level.id_level;
						";
		$resultmember = mysqli_query ($koneksi,$querymember); 
	?>
	<body>
	
		<br/>
		<br/>
		<div class="container">		
			<a href="transaksi.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA TRANSAKSI</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_member">Member</label>
					<div class="col-sm-5">
						<select class="form-control" name="id_member" id="id_member" onchange="DataMember()">
							<option value="">-----Pilih MEMBER-----</option>
								<?php
								while ($datamember=mysqli_fetch_array($resultmember))
								{
									echo "<option value=$datamember[id_member]>$datamember[nama_member]</option>";
								}
								?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tgl_transaksi">Tanggal</label>
					<div class="col-sm-5">
						<input type="date" class="form-control" name="tgl_transaksi">
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="no_transaksi">No. Transaksi</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="no_transaksi">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="jenis_transaksi">Jenis Transaksi</label>
					<div class="col-sm-5">
						<select class="form-control" name="jenis_transaksi" id="jenis_transaksi">
							<option value="">-----Pilih JENIS TRANSAKSI-----</option>
							<option value="TUNAI">TUNAI</option>
							<option value="CREDIT">CREDIT</option>
						</select>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="barang_id">Barang</label>
					<div class="col-sm-5">
						<select class="form-control" name="barang_id" id="barang_id">
							<option value="">-----Pilih BARANG-----</option>
								<?php
								while ($databarang=mysqli_fetch_array($resultbarang))
								{
									echo "<option value=$databarang[id_barang]>$databarang[nama_barang]</option>";
								}
								?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="total_pembelian">Total Pembelian</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="total_pembelian" id="total_pembelian" onchange="TotalPembelian()">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="diskon_member">Diskon Member</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="diskon_member" id="diskon_member">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="diskon_barang">Diskon Barang</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="diskon_barang" id="diskon_barang">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="total_diskon">Total Diskon</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="total_diskon" id="total_diskon">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="jumlah_transaksi">Jumlah Transaksi</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="jumlah_transaksi" id="jumlah_transaksi">
					</div>
				</div>
				<input type="submit" name="save" class="btn btn-danger">
			</form>		
		</div>
	<script type='text/javascript'>
		function DataMember()
		{
			var id_member = document.getElementById("id_member").value;
			//alert(id_member);

			$.ajax
			({
				url : "ambilmember.php",
				method : "POST",
				data : {
					x : id_member 
				},
				dataType : "JSON",
				success : function(data){
					document.getElementById("diskon_member").value = data.Diskon;

					document.getElementById("diskon_member").setAttribute('readonly',true);
				}
			})
		}

		function TotalPembelian()
		{
			
			var total_pembelian = document.getElementById("total_pembelian").value;
			//alert(total_pembelian);

			if (total_pembelian > 100000) {
				var diskon_barang = document.getElementById("diskon_barang").value = 10;
			} else {
				var diskon_barang = document.getElementById("diskon_barang").value = 0;
			}

			var diskon_member = document.getElementById("diskon_member").value;

			var total_diskon = document.getElementById("total_diskon").value = (((parseInt(diskon_member) + parseInt(diskon_barang))/100)*total_pembelian);
			//alert(total_diskon);

			var jumlah_transaksi = document.getElementById("jumlah_transaksi").value = (total_pembelian - total_diskon) ;
			//alert(jumlah_transaksi);
		}
	</script>					
		
	</body>
</html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<h2>REPORT - TRANSAKSI</h2>
		<a href="transaksi.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
		<br/>
		<br/>
		<table border="1" class='table'>
			<tr>
				<th>Member</th>
				<th>Level</th>
				<th>Diskon Member</th>
				<th>Diskon Barang</th>
				<th>Total Pembelian</th>
				<th>Total Diskon</th>
				<th>Total Transaksi</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM transaksi t LEFT JOIN member m on t.id_member = m.id_member LEFT JOIN level l on l.id_level = m.id_level");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $data['nama_member']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td><?php echo $data['diskon_member']; ?> %</td>
				<td><?php echo $data['diskon_barang']; ?> %</td>
				<td><?php echo $data['total_pembelian']; ?></td>
				<td><?php echo $data['total_diskon']; ?></td>
				<td><?php echo $data['jumlah_transaksi']; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
<?php
session_start();
include_once('koneksi.php');

$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];
	
    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {
		if(isset($_POST['search']))
		{
			$no = 1;
			$queryshow = mysqli_query($koneksi," SELECT * FROM barang b LEFT JOIN kategori k on b.kategori_id = k.id_kategori where (b.nama_barang like '%".$_POST['search_bar']."%') OR (b.kode_barang like '%".$_POST['search_bar']."%') OR (b.qty like '%".$_POST['search_bar']."%') OR (k.nama_kategori like '%".$_POST['search_bar']."%') ");
		}
		else
		{
			$no = 1;
			$queryshow = mysqli_query($koneksi," SELECT * FROM barang b LEFT JOIN kategori k on b.kategori_id = k.id_kategori");
		}

		
    }
    else
    {
        echo ("
            <script type='text/javascript'>
                alert('Anda harus login');document.location='index.php';
            </script>
        ");
    }

    include_once('navbar.php');
?>
	
	<html>
		<head>
			<title>CRUD - SEDERHANA</title>
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
			<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
			<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
			<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		</head>
		<body>
			<h2>MODULE BARANG</h2>
			</br>
			<form method="POST">
				<table>
					<tr>
						<td><input type="text" name="search_bar" id="search_bar"></td>
						<td><input type="submit" name="search" value="Search"></td>
					</tr>
				</table>
			</form>
			<a href="tambah_barang.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH BARANG</a>
			<br/>
			<br/>
			<table border="1" class="table">
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Kode Barang</th>
					<th>QTY</th>
					<th>Kategori</th>
					<th>OPSI</th>
				</tr>
<?php
					while($fajar = mysqli_fetch_array($queryshow))
					{
?>
				<tbody id="table-fajar" >
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $fajar['nama_barang']; ?></td>
						<td><?php echo $fajar['kode_barang']; ?></td>
						<td><?php echo $fajar['qty']; ?></td>
						<td><?php echo $fajar['nama_kategori'];?></td>
						<td>
							<a href="edit_user.php?id= <?php echo $fajar['id_barang'] ?>">EDIT</a>
							<a href="hapus_user.php?id= <?php echo $fajar['id_barang'] ?>">HAPUS</a>
						</td>
					</tr>
				</tbody>
<?php	
					}
?>
			</table>
		</body>
	</html>

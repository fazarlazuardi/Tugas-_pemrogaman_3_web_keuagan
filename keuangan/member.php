<?php
session_start();
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {

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
		<h2>MODULE MEMBER</h2>
		<br/>
			<td>Search <input type="text" name="search" id="search"></td>
		<br/>
		<br/>
		<a href="tambah_member.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH MEMBER</a>
		<br/>
		<br/>
		<table border="1" class='table'>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Level</th>
				<th>Status</th>
				<th>OPSI</th>
			</tr>
			<?php
				include_once('koneksi.php');
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM member
												LEFT JOIN level on level.id_level = member.id_level 
									");
				while($fajar = mysqli_fetch_array($query))
				{
			?>
			<tbody id="table-fajar">
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $fajar['nama_member']; ?></td>
				<td><?php echo $fajar['alamat_member']; ?></td>
				<td><?php echo $fajar['nama_level']; ?></td>
				<td><?php echo $fajar['status']; ?></td>
				<td>
					<a href="edit_user.php?id=<?php echo $fajar['id']; ?>">EDIT</a>
					<a href="hapus_user.php?id=<?php echo $fajar['id']; ?>">HAPUS</a>
				</td>
			</tr>
			</tbody>
			<?php
				}
			?>
		</table>
	</body>
	<script type='text/javascript'>
		$(document).ready(function(){
			$("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#table-fajar tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</html>
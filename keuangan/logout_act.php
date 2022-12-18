<?php
session_start();
include_once('koneksi.php');

$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

$query=mysqli_query($koneksi,"Update user set online='0' where username = '$username' and password = '$password' ");

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['level']); 
unset($_SESSION['nama_level']);

header('Location: index.php');

?>
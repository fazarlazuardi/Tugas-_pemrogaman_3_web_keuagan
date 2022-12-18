<?php
error_reporting(0);
session_start();
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {
      header('Location: Homepage.php');
    }
    else
    {
      //header('Location: index.php');
    }

?>

<html>
  <head>
    <title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  </head>
  <body>
    <center>
      <form class="form-horizontal"  method="POST" action="cek_login.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <input type="submit" name="login" class="btn btn-danger">
      </form>		
    </center>
  </body>
</html>


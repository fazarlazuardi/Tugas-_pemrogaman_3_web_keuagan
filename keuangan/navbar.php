<head> 
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .social-part{
            padding-right:30px;
            margin-left:1000px;
        }
        .logout{
            margin-left:1000px;
        }
        ul li a{
            margin-right: 20px;
        }

    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-sm   navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
<?php 
    if($nama_level == 'Administrator')
    {
?>
                <li class="nav-item">
                    <a class="nav-link" href="Homepage.php">Home</a>
                </li>
                <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Master</a>
                    <div class="dropdown-menu sm-menu">
                        <a class="dropdown-item" href="barang.php">Barang</a>
                        <a class="dropdown-item" href="diskon.php">Diskon</a>
                        <a class="dropdown-item" href="kategori.php">Kategori</a>
                        <a class="dropdown-item" href="level.php">Level</a>
                        <a class="dropdown-item" href="member.php">Member</a>
                        <a class="dropdown-item" href="tipe.php">Tipe</a>
                        <a class="dropdown-item" href="user.php">User</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                </li>
<?php 
    }
    else if($nama_level =='KASIR')
    { 
?>
                <li class="nav-item">
                    <a class="nav-link" href="Homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Homepage.php">Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                </li>
<?php 
    } 
?>
            </ul>
            <!--
            <div class="social-part">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
            -->
            <div class="logout">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown dmenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Hello <?php echo $username; ?></a>
                        <div class="dropdown-menu sm-menu">
                            <a class="dropdown-item" href="logout_act.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
    $('.navbar-light .dmenu').hover(function () {
            $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
        }, function () {
            $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
        });
    });
    </script>

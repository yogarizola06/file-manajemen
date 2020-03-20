<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>File Manajer</title>

    <link href="<?php echo URL;?>/themes/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL;?>/themes/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo URL;?>/themes/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo URL;?>/themes/inspinia/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo URL;?>/themes/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?php echo URL;?>/themes/inspinia/css/style.css" rel="stylesheet">

    <link href="<?php echo URL;?>/themes/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <script src="<?php echo URL;?>/themes/inspinia/js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo URL;?>/themes/inspinia/img/profile_small.jpg" />
                             </span>
                            
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nm_staff']; ?></strong></span> 
                            
                            
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                   
                    <li>
                        <a href="<?php echo URL;?>/index.php/univrab/"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li>
                        <a href="<?php echo URL;?>/index.php/univrab/departemen"><i class="fa fa-institution"></i> <span class="nav-label">Departemen</span></a>
                    </li>
                    <li>
                        <a href="<?php echo URL;?>/index.php/univrab/staff"><i class="fa fa-user"></i> <span class="nav-label">Staff</span></a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo URL;?>/index.php/univrab/file_manager"><i class="fa fa-folder"></i> <span class="nav-label">File Manajer</span></a>
                    </li> -->
                  
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Selamat Datang <?php echo $_SESSION['nm_staff']; ?> di Sistem Manajemen File</span>
                </li>
                
                
                <li>
                    <a href="<?php echo URL;?>/index.php/univrab/keluar">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>
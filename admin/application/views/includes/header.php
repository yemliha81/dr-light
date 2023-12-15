<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dr Light E-ticaret Yönetici Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo FATHER_BASE;?>template/css/morris.css" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/css/style.css" rel="stylesheet">
    <link href="<?php echo FATHER_BASE;?>template/css/dropify.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo FATHER_BASE;?>template/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
		body{
			font-family: 'Open Sans', sans-serif;
		}
		.grid-5{
		    display:grid;
		    grid-template-columns:1fr 1fr 1fr;
		    grid-gap:10px;
		}
		.grid-5 > .variantDiv{
		    padding:15px;
		    border:1px solid #f3f3f3;
		    height: 200px;
            overflow-y: scroll;
		}
	</style>
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Yönetim Paneli</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    
                    <li class="divider"></li>
                    <li><a href="<?php echo LOGOUT;?>"><i class="fa fa-sign-out fa-fw"></i> Çıkış</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <?php include('left_nav.php');?>

            </div>
        </div>
    </nav>
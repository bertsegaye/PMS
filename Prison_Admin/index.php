<?php
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
  }

if (!isset($_SESSION['PrisonAdmin_logged'])) {
    header("location:../index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>PMS for Assosa Correction House </title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
    ul li ul.dropdown{
    min-width: 225px; /* Set width of the dropdown */
    background-color: black;
    display: none;
    position: absolute;
    z-index: 999;
    left: 0;
}
ul li:hover ul.dropdown{
    display: block; /* Display the dropdown */
}
ul li ul.dropdown li{
    display: block;
}
.dropdown a{
    color: black;
}

</style>

</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">

            <div class="navbar-header" style="background: #FFF1DC; ">

                <div class="top-left-part" style="background: #0A4D68;">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="plugins/images/pr_admin_logooo.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><b>Prison Admin</b>
                     </span> </a>
                </div>
                <!-- /Logo -->
                <div style="background: white; text-align: center; height: 0px; color: #2192FF;"><h1><b>Assosa's Prison Managment System</b></h1></div>
                <ul class="nav navbar-top-links navbar-right pull-right" style="height: 0px; ">

                    <li class = "dropdown" style="color: black;">
                    <a style="color: black;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src = "../upload/image//<?php echo ($photo_session)?>" alt="user-img" width="36" class="img-circle"><b><?php echo $login_session;?></b></a>
                        <ul class="dropdown-menu">
                        <li><a href="change_password.php?user_name=<?php echo $login_session?>"><i class = "fa fa-unlock-alt fa-fw"></i>  Change password</a></li>

                        <li><a href="logout.php"><i class = "glyphicon glyphicon-off fa-fw"></i> Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="basic-table.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Manage prisoners</a>
                    </li>
                 
                    <li>
                        <a href="transfer_prisoner.php" class="waves-effect"><i class="fa fa-exchange fa-fw" aria-hidden="true"></i>transfer Prisoner</a>
                    </li>

                    <li>
                        <a href="amekiro.php" class="waves-effect"><i class="fa fa-hourglass-half fa-fw" aria-hidden="true"></i>Amekiro</a>
                    </li>
                    <li>
                        <a href="blank.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Post Announcement </a>
                    </li>
                    <li>
                        <a href="view_post.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Manage Announcement </a>
                    </li>
                    <li>
                        <a href="General_report.php" class="waves-effect"><i class="fa fa-registered fa-fw" aria-hidden="true"></i>General Report</a>
                    </li>
                    <li>
                        <a href="report.php" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i></i>General Info</a>
                    </li>

                </ul>
            
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid" style="">
                <!-- <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="" target="" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Welcome to Assosa Correction House</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    /.col-lg-12 
                </div>-->

                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                       <?php $q_pp = $con->query("SELECT COUNT(*) as totall FROM `prisoner` WHERE status='checkin'") or die(mysqli_error());
				$f_pp = $q_pp->fetch_array();?>
                            <h3 class="box-title"><a href="display_prisoners.php"></i>Total Active Prisoners</a></h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <!--<div id="sparklinedash"></div>-->
                                  <div id="sparklinedash"></div>

                                </li>
                                <!--<a class = "btn btn-info disabled" href = "basic-table.php"><span class = "badge"><?php echo $f_pp['totall']?></span> Check In</a>&ensp;-->

                                <li class="text-right"><i class="ti-arrow-up text-success" ></i> <span class="counter text-success"><?php echo $f_pp['totall']?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                       <?php $q_p = $con->query("SELECT COUNT(*) as total FROM `prisoner` WHERE  status='checkout'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();?>
                            <h3 class="box-title"><a href="display_leaved_prisoners.php"></i>Total leaved Prisoners</a></h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $f_p['total']?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                        <?php $q_pp = $con->query("SELECT COUNT(*) as totalvv FROM `visitor`") or die(mysqli_error());
				$f_pp = $q_pp->fetch_array();?>
                            <h3 class="box-title"><a href="display_visitors.php"></i>Total Visitors</a></h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $f_pp['totalvv']?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                        <?php $q_p = $con->query("SELECT COUNT(*) as totalv FROM `prisoner` WHERE  status='transfered'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();?>
                            <h3 class="box-title"><a href="display_transfered_prisoners.php">Total Transfered Prisoners</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $f_p['totalv']?></span></li>
                            </ul>
                        </div>
                    </div>

                
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
              
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
            
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
<img src="../ppp.jpg" style="width: 115rem; height: 50rem;">
            </div>
            <!-- /.container-fluid -->
             <footer class="footer text-center"> 2023 &copy; Assosa Prison Managment System , All Rights Reserved</footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>

</body>

</html>

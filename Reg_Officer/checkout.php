


<?php   
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
  }
if (!isset($_SESSION['reg_logged'])) {
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
    <title>WBCHMS for Assosa Correction House </title>
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
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="plugins/images/reg_logoo.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="plugins/images/reg_off.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class = "dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src = "../upload/image//<?php echo ($photo_session)?>" alt="user-img" width="36" class="img-circle"><?php echo $login_session;?></a>
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
                        <a href="add_account.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Register Prisoner</a>
                    </li>
                    <li>
                        <a href="basic-table.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Manage prisoners</a>
                    </li>
                  
                    <li>
                        <a href="General_report.php" class="waves-effect"><i class="fa fa-registered fa-fw" aria-hidden="true"></i>General Report</a>
                    </li>
                    <li>
                        <?php
                        $count = $con->query("SELECT COUNT(*) as total FROM `announcement` WHERE
                        ro_status='1'") or die(mysqli_error()); $countt =
                        $count->fetch_array(); ?>
                        <a href="view_post.php"  class="waves-effect glyphicon glyphicon-bell" >ViewAnnouncement<span class="badge" style="margin-right: 2px; padding: 5px;"><?php echo $countt['total']?></span></a>
                    </li>

                    <li>
                        <a href="room.php" class="waves-effect"><i class="fa fa-bed fa-fw" aria-hidden="true"></i>Assign room</a>
                    </li>
                    <li>
                        <a href="view_room.php" class="waves-effect"><i class="fa fa-university fa-fw" aria-hidden="true"></i>manage room</a>
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
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="" target="" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Welcome to Assosa Correction House</a>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info">Prisoners</div>
                            <div class="table-responsive">
                            <?php
                                $today = date('Y-m-d');

				$q_p = $con->query("SELECT COUNT(*) as total FROM `prisoner` WHERE release_date<='$today' AND status='checkin'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
			
			            ?>
                       
                              <table class="table">
                                    <a class = "btn btn-success" href = "add_account.php"><i class = "glyphicon glyphicon-plus"></i> add New prisoner</a>&ensp;
                                    <a class = "btn btn-success" href = "pending_prisoner.php"><span class = "badge"><?php echo $f_p['total']?></span> Pendings</a>&ensp;
                                    <a class = "btn btn-info" href = "pending_prisoner.php"><span class = "badge"><?php echo $f_p['total']?></span> Check In</a>&ensp;
                                    <a class = "btn btn-warning disabled"><i class = "glyphicon glyphicon-eye-open"></i> Check Out</a>
                                    <br />
                <br />
                <table id = "table" class = "table table-bordered">
                    
                      <thead>
                        <tr>
                            
                            <th>FName</th>
                            <th>LName</th>
                            <th>sex</th>
                            <th>age</th>
                            <th>photo</th>
                            <th>crime_type</th>
                            <th>entry_date</th>
                          <th>release_date</th>
                            <th>region</th>
                            <th>Zone</th>
                            <th>woreda</th>
                            <th>kebele</th>


                            
                            
                        </tr>
                    </thead>

                    <tbody>
                   
                    
            <?php 
             
             //$query = $con->query("SELECT * from users_info") or die(mysqli_error());
             $query = $con->query("SELECT * from prisoner  JOIN address on address.address_id=prisoner.address_id WHERE status='CheckOut'") or die(mysqli_error());
                            while($fetch = $query->fetch_array()){
                            ?>
                            <tr>
                            <td><?php echo $fetch['fname']?></td>
                            <td><?php echo $fetch['lname']?></td>
                            <td><?php echo $fetch['sex']?></td>
                            <td><?php echo ($fetch['age'])?></td>
                         <td><center><img src = "../upload/image//<?php echo ($fetch['photo'])?>" height = "50" width = "50"/></center></td>

                         <td><?php echo ($fetch['crime_type'])?></td>

                        <td><?php echo ($fetch['entry_date'])?></td>
                        <td><?php echo ($fetch['release_date'])?></td>

                         <td><?php echo ($fetch['region'])?></td>

                            <td><?php echo ($fetch['zone'])?></td>
                          
                            <td><?php echo ($fetch['woreda'])?></td>
                            <td><?php echo ($fetch['kebele'])?></td>
                            
                        </tr>
                           
                     
                  <?php
                     }
                     
                    ?>
                    
                   
                    </tbody>


                </table>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2023 &copy; Assosa Prison Managment System , All Rights Reserved</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
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
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
<script type = "text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to delete this record?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>



<script src = "js/jquery.dataTables.js"></script>
<script src = "js/dataTables.bootstrap.js"></script>


</body>
<script type = "text/javascript">
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>
</html>

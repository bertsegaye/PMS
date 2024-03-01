

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

<?php

if(ISSET($_POST['assign'])){
//echo "<script>alert('check')</script>";

    $room_name=$_POST['room_name'];
    $gender=$_POST['gender'];

    $query=("SELECT * FROM `prisoner` WHERE `status` = 'checkin' && `room_name` = '$room_name' && `sex` = '$gender'") or die(mysqli_error());
    $query1=mysqli_query($con,$query);
    $row = $query1->num_rows;
    
    if($row > 5){
        echo "<script>
        alert(' the room is already assigned for other prisoners ');
        window.location.href='room.php';
        </script>";

    }
else{
     $sql1="UPDATE prisoner SET `room_name` = '$room_name' WHERE  prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
    $query_result=mysqli_query($con,$sql1);

    if ($query_result) {
      
    echo "<script>
alert(' Room Assigned  successfully');
window.location.href='room.php';
</script>";

//header("location: basic-table.php");
}
}

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
                        <a href="view_post.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>View Announcement</a>
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
                        <h4 class="page-title">Assign Room</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="" target="" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Welcome to Assosa Correction House</a>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Assign Room</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info">Room / Assign Room for prisoners</div>

                            <?php
                            
                           $query = $con->query("SELECT * FROM prisoner, address where prisoner.address_id  = address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'") or die(mysqli_error());
                            
                   //$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
                   //$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
                 $fetch = $query->fetch_array();
                        ?>
                            <br />
                            <div style="width: 50%;">

                    <form method = "POST" enctype = "multipart/form-data">
                       
                        <div class = "form-group">
                            <label>fname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['fname']?>"  size="40" name = "fname" disabled = "disabled" />

                        </div>
                        <div class = "form-group">
                            <label>lname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['lname']?>"  name = "lname" disabled = "disabled"/>
                        </div>
                          <div class = "form-group">
                            <label>gender </label>
                           <?php  $sex=$fetch['sex'];?>
                            <input type = "text" class = "form-control" value = "<?php echo $sex?>"  name = "gender" readonly/>
                        </div>

                        <div class = "form-group">
                        <label for="prisoner id">room number</label>
                         <select name="room_name"  id="room_name" class = "form-control"  required>
						<?php
                        
						$sql1="select * from room WHERE gender='$sex'";   
						  $sql1=mysqli_query($con,$sql1);
						  if($sql1)
						  {?>
						  <option value=""  selected="true" disabled="disabled">Select room you want to assign</option>	<?php					
						while($row=mysqli_fetch_array($sql1))
						  {
						?>
					
						<option value="<?php echo $row["room_name"];?>">
						<?php echo $row["room_name"];?>							
						</option>
						<?php
						}}
						?>
                        </select>
                        </div>

                        <div class = "form-group">
                            <button type="submit" name = "assign" value="assign room" class = "btn btn-info form-control" onclick="return confirmation ();"><i class = "glyphicon glyphicon-save "></i> assign</button>
                        </div>
                        </br> 



                             
                    </form>
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




</body>


</html>

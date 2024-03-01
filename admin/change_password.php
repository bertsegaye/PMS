
<?php
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
  }

?>
<?php
  if(isset($_POST['edit_password'])){
    $old_password=$_POST['cpassword'];
    $old_password = mysqli_real_escape_string($con,$old_password); 
    $old_passwordd=md5($old_password);
    $password=$_POST['password'];
    $password1=$_POST['password1'];
    $password1 = mysqli_real_escape_string($con,$password1); 
    $new_passwordd=md5($password1);
    if ($password==$password1) {
       

$query = $con->query("SELECT * FROM users where username = '$_REQUEST[user_name]'") or die(mysqli_error());
$fetch = $query->fetch_array();
$db_password=$fetch['password'];
if($old_passwordd == $db_password) {
     $sql1="UPDATE users SET `password` = '$new_passwordd' WHERE username = '$_REQUEST[user_name]'" or die(mysqli_error());
     $query_result=mysqli_query($con,$sql1);
     if ($query_result) {
        echo "<script>
    alert(' password changed successfully');
    window.location.href='index.php';
    </script>";
    
    //header("location: basic-table.php");
    }
    else{
        echo "<script>
    alert(' password not changed');
    window.location.href='index.php';
    </script>"; 
    }

}
else{
    echo "<script>
    alert('current password is incorrect');
    window.location.href='index.php';
    </script>";  

}
  


    }
    else {
        echo "<script>
        alert('confirmation password not correct');
        window.location.href='index.php';
        </script>"; 
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
    <title>PMS for Assosa Prison Managment System </title>
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
            <div class="navbar-header" style="background: #FFF1DC; ">

                <div class="top-left-part" style="background: #0A4D68;">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><b>System Admin</b>
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
                        <a href="add_account.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Creating Account</a>
                    </li>
                    <li>
                        <a href="basic-table.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Manage Accounts</a>
                    </li>

                    <li>
                        <a href="account_activate.php" class="waves-effect"><i class="fa fa-check-square-o fa-fw" aria-hidden="true"></i></i>Activate Account</a>
                    </li>
                    <li>
                        <a href="account_deactivate.php" class="waves-effect"><i class = "fa fa-ban fa-fw" aria-hidden="true"></i>Deactivate Account</a>
                    </li>
                    <li>
                        <a href="backup.php" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Data Backup</a>
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
                
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info">Password/change Password</div>

                            <?php

                           $query = $con->query("SELECT * FROM users where username = '$_REQUEST[user_name]'") or die(mysqli_error());
                   //$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
                   //$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
                 $fetch = $query->fetch_array();
                 $password=$fetch['password'];

                        ?>
                            <br />
                   <div style="width: 50%;">
                    <form method = "POST" action = "" enctype = "multipart/form-data">
                  <label for="password">current password</label>   
                    <input type="password" name="cpassword" class="form-control"  id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <label for="password">new password</label>   
                    <input type="password" name="password" class="form-control"  id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                     <label for="confirm">confirm password</label>
                     <input type="password" name="password1" class="form-control" id="psw"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <br><div class = "form-group">
                            <button name = "edit_password" class = "btn btn-warning form-control" onclick="return confirmation ();"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
                        </div>
                    </form></div>
                  

        
                            
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


<script>
     function confirmation(){
        var x =confirm("do you want to change password ");
        if (x==true)
        {
                var myInput = document.getElementById("age");
            console.log(myInput);
            return true;
            
        }
       else
           return false;
    }
</script>

</body>


</html>

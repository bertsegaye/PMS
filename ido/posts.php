<?php
include '../db/connection.php';
include('session.php');
//session_start();

if (!isset($_SESSION['username'])) {
    header("location:../index.php");
  }

if (!isset($_SESSION['ido_logged'])) {
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
    <title>IDO-priosn managment system</title>
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
    <link href="css/all.css"  rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">

</style>

</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader 
  ============================================================== -->
      <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>-->
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation" style="">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h1 style="margin-top: 20px; font-size: 24px;"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 45px;"></i><br><b style="font-size: 17px; font-family: initial; ">Information officer</b></h1>
                </div>
                <ul class="nav" id="side-menu"  style="padding-top:150px;">
                    <li style="" id="navlinks">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li id="navlinks">
                        <a href="add_visitor.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Add Visitors</a>
                    </li >
                    <li id="navlinks">
                        <a href="manage-visitor.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Manage Visitors</a>
                    </li>                       
                    <li id="navlinks">
                        <?php
                $count = $con->query("SELECT COUNT(*) as total FROM `announcement` WHERE
                ido_status='1'") or die(mysqli_error()); $countt =
                $count->fetch_array(); ?>
                        <a href="posts.php"  class="waves-effect glyphicon glyphicon-bell" >Announcements<span class="badge" style="margin-right: 2px; padding: 5px;"><?php echo $countt['total']?></span></a>
                    </li>
                    <li id="navlinks">
                        <a href="visit_status.php" class="waves-effect"><i class="fa fa-binoculars fa-fw" aria-hidden="true"></i>visit status</a>
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
       <div style=" text-align: center; height: 0px;">
            <h1 style="color: #2192FF;"><b>Assosa's Prison Managment System</b></h1>
            <div class="con">

        <div class="name" style="margin-left: 1200px;  z-index: ; margin-top: -50px;height:0px;">

       <img src = "../upload/image/<?php echo ($photo_session)?>" style="width: 40px; height: 40px; border-radius: 50%;"><span style="font-size: 22px;"><?php echo $_SESSION['username'] ?></span>

       <div class="drop">
                          <a href="change_password.php"  > change password</a><br>
                        <a href="logout.php"  style=" padding-top: 10px; width: ;"> logout</a>
                                    
                       </div>
       </div>

          </div>
        </div>


        <div id="page-wrapper" style="">

            <div class="container-fluid">

               <div style="width: 190px;">
                    
                         <ol class="breadcrumb">
                <?php
                $count = $con->query("SELECT COUNT(*) as total FROM `announcement` WHERE
                ido_status='1'") or die(mysqli_error()); $countt =
                $count->fetch_array(); ?>
                
                <li class="active"> Announcement</li>
                <a class="glyphicon glyphicon-bell" href=""
                  ><span class="badge"><?php echo $countt['total']?></span> </a
                >&ensp;

              </ol>
            </div>
                    <!-- /.col-lg-12 -->
                
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
<section id="contact">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                      

                <table id = "table" class = "table table-bordered">
                    
                    <thead>
                      <tr>
                          
                          <th>message</th>
                          <th>Action</th>

      
                      </tr>
                  </thead>

                  <tbody>
                 
                  
          <?php 
           
           //$query = $con->query("SELECT * from users_info") or die(mysqli_error());
           $query = $con->query("SELECT * from announcement order by id DESC") or die(mysqli_error());
                          while($fetch = $query->fetch_array()){
                          ?>
                          <tr
                         <?php if ($fetch['sm_status'] == 1) {
                          echo 'style="background-color: #e1e1e1; color: green; font-weight: bold;"';
                        }?>>
                          
                          
                          <td> <div class="col-md-12 col-sm-12">
                          
                            <input type="text" class="form-control" disabled  value="<?php echo $fetch['Title']?>"/>
                            <textarea class="form-control" rows="5" disabled cols=""><?php echo $fetch['post']?></textarea></div></td>

                          <!--</div><?php echo $fetch['fname']?>-->                         
                          <td><center><a class = "btn btn-warning" href = "read_post.php?post=<?php echo $fetch['id']?>"><i class = "fa fa-eye"></i> view</a></center></td>       
     
                      </tr>
                         
                <?php
                   }
                   
                  ?>
                  
                 
                  </tbody>


              </table>
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <div class="contact-image">
                          <img
                            src="../upload/image/prisn.jpg"
                            class="img-responsive"
                            alt="Smiling Two Girls"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

            </div>
            <!-- /.container-fluid -->
            <footer style="background: #000000; color: white;" class="footer text-center"> 2023 &copy; Assosa's Prison Managment System , All Rights Reserved</footer>
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
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>




    
</body>

</html>

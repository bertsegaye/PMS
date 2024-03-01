
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="plugins/images/favicon.png"
    />
    <title>PMS for Assosa Correction House </title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link
      href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css"
      rel="stylesheet"
    />
    
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      ul li ul.dropdown {
        min-width: 125px; /* Set width of the dropdown */
        background-color: black;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
      }
      ul li:hover ul.dropdown {
        display: block; /* Display the dropdown */
      }
      ul li ul.dropdown li {
        display: block;
      }
    </style>
  </head>

  <body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle
          class="path"
          cx="50"
          cy="50"
          r="20"
          fill="none"
          stroke-width="2"
          stroke-miterlimit="10"
        />
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
        <div class="navbar-header" style="background: #2192FF; ">

                <div class="top-left-part" style="background: #0A4D68;">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/reg_logoo.png" alt="home" class="dark-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><b>Registrar Office</b>
                     </span> </a>
                </div>
                <!-- /Logo -->
                <div style="background: white; text-align: center; height: 0px; color: #2192FF;"><h1 style="color: white;"><b>Assosa's Prison Managment System</b></h1></div>
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
            <h3>
              <span class="fa-fw open-close"
                ><i class="ti-close ti-menu"></i
              ></span>
              <span class="hide-menu">Navigation</span>
            </h3>
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
                ro_status='1' order by id DESC") or die(mysqli_error()); $countt =
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

      
                      </tr>
                  </thead>

                  <tbody>
                 
                  
          <?php 
           
           //$query = $con->query("SELECT * from users_info") or die(mysqli_error());
           $query = $con->query("SELECT * from announcement where id = '$_REQUEST[post]' ") or die(mysqli_error());
           $setread=mysqli_query($con, "UPDATE announcement SET ido_status=0 WHERE id='$_REQUEST[post]'");
                          while($fetch = $query->fetch_array()){
                          ?>
                          <tr>
          
                          
                          <td> <div class="col-sm-12"> <div class = "form-group">
                          
                            <input type="text" class="form-control"  disabled value="<?php echo $fetch['Title']?>"/>
                            <textarea class="form-control" rows="5" disabled cols=""><?php echo $fetch['post']?></textarea>
                          </div>
                          </div>
                           <?php $var=$fetch['file'];?>
                            <a download href="../upload/files/<?php echo $var ?>"><?php echo $var ?></a>
                            <hr>
                            <label>posted date </label>

                            <input type="datetime" class="form-control"  readonly value="<?php echo $fetch['date']?>"/></td>

                          <!--</div><?php echo $fetch['fname']?>-->                         
     
                      </tr>

                       <?php
                       $ro_status=$fetch['ro_status'];
                       ?>  
                <?php
                   }
                   
                  ?>
                  
                 
                  </tbody>


              </table>
                      </div>

<?php
if($ro_status){
           $query="UPDATE announcement SET ro_status = 0 WHERE id = '$_REQUEST[post]' " or die(mysqli_error());
           mysqli_query($con,$query);
}

 ?>

                      <div class="col-md-6 col-sm-12">
                        <div class="contact-image">
                          <img
                            src="../upload/contact-1-600x400.jpg"
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
        <footer class="footer text-center"> 2023 &copy; Assosa Correction House , All Rights Reserved</footer>

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

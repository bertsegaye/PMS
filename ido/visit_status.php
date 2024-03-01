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
<?php
  if(isset($_POST['register'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
    $visitee=$_POST['pid'];
    $stay=$_POST['release_time'];
    $date = date('Y-m-d H:i:s');
    $release_time = date('Y-m-d H:i:s',strtotime("+{$stay} minutes",strtotime($date)));
    //adddate('".date("Y-m-d")."',interval ".$stayy." month)
    $photo=$_FILES["photo"]["name"];
    if ($_FILES['photo']['size'] != 0 ){
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);

// if (empty($fname) || empty($lname) || empty($serial_no)) {
//  echo "<script>alert('image 2nd if')</script>";
//   echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>please fill the form</font>";
// }
// else{



if($age<14) {

    echo "<script>
    alert('ohhh.....age should be >18');
    window.location.href='basic-table.php';
    </script>";
}

  else{  
      //$check = "SELECT * FROM visitor WHERE visitee = $visitee";
      $query = "SELECT * FROM visitor WHERE visitee = '$visitee' order by vid desc limit 1" or die(mysqli_error());

   

   $result=mysqli_query($con,$query);

     $fetch=mysqli_fetch_array($result);
     $time=$fetch['release_time'];
       // $datetime1 = new DateTime($time);
        // $datetime2 = new DateTime($date);
      //$result = mysqli_query($con,$check);
      if ($time > $date) {
          echo "<script>
          alert('ohhh.....this prisoner is visiting another visitor know please wait some minutes');
          window.location.href='basic-table.php';
          </script>";
        }
 
        else{
        $sql="INSERT INTO visitor(vid,fname,  lname, sex, age,photo,tele,visitee,visit_time,release_time) VALUES ('','$fname','$lname','$sex','$age','$photo','$tele','$visitee','$date','$release_time')";
    //$sql="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('','$serial_no','$fname','$password','$account_type','1')";
    

    $query=mysqli_query($con,$sql);
        
   

             if ($query) {    
       
                echo "<script>
         alert(' visitor registered successfully');
         window.location.href='basic-table.php';
         </script>";
     
             }
         
             else {
                   echo "<script>alert('not registered')</script>";

             }
         
            }
   

    }
// }

  }

  else {

    echo "<script> alert('image can not empty') </script>";
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
                
                <!-- /row -->
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info" style="background-color: seagreen; font-size: 22px; color: black; border-radius: 0.5rem; width: 50%; margin-left: 300px;">prisonor-Visitors Status</div>
                            <div class="table-responsive">
                              <table class="table">
                                    <br />
                <br />
                <table id = "table" class = "table table-bordered">
                    
                      <thead>
                        <tr>
                            <th>visitor Name</th>
                            <th>photo</th>
                            <th>visitted prisoner</th>
                            <th>status</th>

                            
                            
                        </tr>
                    </thead>

                    <tbody>
                   
                    
            <?php 
                 $date = date('Y-m-d H:i:s');

             //$query = $con->query("SELECT * from users_info") or die(mysqli_error());
             $query = $con->query("SELECT * from visitor") or die(mysqli_error());
                            while($fetch = $query->fetch_array()){
                            ?>
                            <tr>
                            
                            <td><?php echo $fetch['fname']?><?php echo" " ?><?php echo $fetch['lname']?></td>

                            <td><center><img src = "../upload/image//<?php echo ($fetch['photo'])?>" height = "50" width = "50"/></center></td>
                            <td><?php echo ($fetch['visitee'])?></td>
                            <td><strong><?php if($fetch['release_time'] > $date){echo "<label style = 'color:#32CD32;'>online";} else if($fetch['release_time']<=$date){echo "<label style = 'color:#ff0000;'>visitted";}?></strong></td>



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


<script src = "js/jquery.dataTables.js"></script>
<script src = "js/dataTables.bootstrap.js"></script>

  <script type = "text/javascript">
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>  
</body>

</html>

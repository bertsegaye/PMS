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
    ul.nav a{
         }
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
        <div class="navbar-default sidebar" role="navigation" style="background: #0A4D68;" >
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h1 style="margin-top: 20px; font-size: 22px;"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 45px;"></i><br> <b style="font-size: 17px; font-family: initial; ">Information officer</b></h1>
                </div>
                <ul class="nav" id="side-menu"  style="padding-top:150px; color: #FFFBEB;">
                    <li style="" id="navlinks">
                        <a style=" color: #FFFBEB;" href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
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
        <div style=" text-align: center; height: 0px; z-index: 1;" >
            <h1 style="color: #2192FF; font-family:;"><b>Assosa's Prison Managment System</b></h1>
            <div class="con">

        <div class="name" style="margin-left: 1200px;  z-index: 1; margin-top: -50px;height:0px;">

       <img src = "../upload/image/<?php echo ($photo_session)?>" style="width: 40px; height: 40px; border-radius: 50%;"><span style="font-size: 22px;"><?php echo $_SESSION['username'] ?></span>

       <div class="drop">
                          <a href="change_password.php"  > change password</a><br>
                        <a href="logout.php"  style=" padding-top: 10px; width: ;"> logout</a>
                                    
                       </div>
       </div>

          </div>
        </div>
       


        <div id="page-wrapper" style="z-index: -1;">
<div class="container-fluid">
            <!-- /row -->
                <div class="row" style="margin-top: 50px; ">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info">Visitor/Modify Visitor Information</div>

                            <?php
                            
                           $query = $con->query("SELECT * FROM visitor where visitor.vid = '$_REQUEST[visitor_id]'") or die(mysqli_error());
                            
                   //$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
                   //$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
                 $fetch = $query->fetch_array();
                        ?>
                            <br />
                   <div style="width: 50%;">
                    <form method = "POST" action = "edit_quiery_visitor.php?visitor_id=<?php echo $fetch['vid']?>" enctype = "multipart/form-data">
                        <div class = "form-group">
                            <label>fname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['fname']?>"  name = "fname" />
                        </div>
                        <div class = "form-group">
                            <label>lname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['lname']?>"  name = "lname" />
                        </div>

                             <div class = "form-group">
                            <label>sex </label>

                         <select id="sex" name="sex" class = "form-control">
                            <option value = "">Choose an option</option>
                            <option value="male" <?php if ($fetch['sex']=="male"){echo "selected";}?>>male</option>
                            <option value="female" <?php if ($fetch['sex']=="female"){echo "selected";}?>>female</option>
                             </select>
                        </div>

                        <div class = "form-group">
                            <label>age </label>
                            <input type = "number" class = "form-control" value = "<?php echo $fetch['age']?>"  name = "age" />
                        </div>
                        <div class = "form-group">
                            <label for="tele">tele</label>
                           <input type="text" class = "form-control" id="tele" value = "<?php echo $fetch['tele']?>" name="tele"  >
                       </div>

                        <div class = "form-group">
                            <label>Photo </label>
                            <div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
                                <img src = "../upload/image/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
                            </div>
                            <input type = "file"  id = "photo" name = "photo" />
                        </div>                  
                        <br />
                        <div class = "form-group">
                            <button name = "edit_visitor" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
                        </div>
                    </form></div>  
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

<script type = "text/javascript">
    $(document).ready(function(){
        $pic = $('<img id = "image" width = "100%" height = "100%"/>');
        $lbl = $('<center id = "lbl">[Photo]</center>');
        $("#photo").change(function(){
            $("#lbl").remove();
            var files = !!this.files ? this.files : [];
            if(!files.length || !window.FileReader){
                $("#image").remove();
                $lbl.appendTo("#preview");
            }
            if(/^image/.test(files[0].type)){
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
                reader.onloadend = function(){
                    $pic.appendTo("#preview");
                    $("#image").attr("src", this.result);
                }
            }
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }




</script>

<script>
  jQuery(document).ready(function(){
    jQuery("#opt11").hide();
    
    

    jQuery("#qtype").change(function(){ 
      var x = jQuery(this).val();     
      if(x == '1') {
        jQuery("#opt11").show();


      } 
            else{
        jQuery("#opt11").hide();

            }
    });
    
  });
</script>


    
</body>

</html>

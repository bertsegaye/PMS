

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
                
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "alert alert-info">Prisoner / Reregister Prisoner Information</div>

                            <?php
                            
                           $query = $con->query("SELECT * FROM prisoner, address where prisoner.address_id  = address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'") or die(mysqli_error());
                            
                   //$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
                   //$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
                 $fetch = $query->fetch_array();
                        ?>
                            
                   
                    <form method = "POST" action = "re_register_prisonerInfo_query.php?prisoner_id=<?php echo $fetch['address_id']?>" enctype = "multipart/form-data">
                        <div class = "form-group" style="width: 40%; float:left;">
                            <label>fname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['fname']?>"  size="40" name = "fname" disabled  />

                        </div>
                        <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                            <label>lname </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['lname']?>"  name = "lname" disabled />
                        </div>

                             <div class = "form-group" style="width: 40%; float:left;">
                            <label>sex </label>
                            
                         <select id="sex" name="sex" class = "form-control" disabled >
                            <option value = "">Choose an option</option>
                            <option value="male" <?php if ($fetch['sex']=="male"){echo "selected";}?>>male</option>
                            <option value="female" <?php if ($fetch['sex']=="female"){echo "selected";}?>>female</option>
                             </select>
                        </div>


                        <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                            <label>crime_type </label>
                            
                       <select id="crime_type" name="crime_type" class = "form-control">
                            <option value = "">Choose an option</option>
                            <option value="rape" <?php if ($fetch['crime_type']=="rape"){echo "selected";}?>>rape</option>
                            <option value="corruption" <?php if ($fetch['crime_type']=="corruption"){echo "selected";}?>>corruption</option>
                              <option value="theaft" <?php if ($fetch['crime_type']=="theaft"){echo "selected";}?>>theaft</option>
                              <option value="murder" <?php if ($fetch['crime_type']=="murder"){echo "selected";}?>>murder</option>
                              <option value="Hate_crimes" <?php if ($fetch['crime_type']=="Hate crimes"){echo "selected";}?>>Hate crimes</option>
                              <option value="Drugs" <?php if ($fetch['crime_type']=="Drugs"){echo "selected";}?>>Drugs</option>
                              <option value="Receipt_of_Stolen_Goods" <?php if ($fetch['crime_type']=="Receipt of Stolen_Goods"){echo "selected";}?>>Receipt of Stolen Goods</option>
                              <option value="Conspiracy" <?php if ($fetch['crime_type']=="Conspiracy"){echo "selected";}?>>Conspiracy</option>
                              <option value="cyber_crimes" <?php if ($fetch['crime_type']=="cyber_crimes"){echo "selected";}?>>cyber_crimes</option>
                              <option value="others" <?php if ($fetch['crime_type']=="others"){echo "selected";}?>>others</option>
                             </select>
                        </div>
                        
                        <div class = "form-group" style="width: 40%; float:left;">
                            <label>age </label>
                              <?php 
                            $date_of_birth=$fetch['age'];
                            $today = date('Y-m-d');                   

                            $years = abs(strtotime($today)-strtotime($date_of_birth)); 
                            $age=floor($years / (365*60*60*24));

                            ?>
                            
                            <input type = "number" class = "form-control" value = "<?php echo $age?>" name = "age" disabled />
                        
                        </div>
                        <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                            <label for="tele">tele</label>
                           <input type="text" class = "form-control" id="tele" value = "<?php echo $fetch['phone']?>" name="tele" disabled  />
                       </div>



                   

                        <div class = "form-group" style="width: 40%;float:left;">
                            <label>Region </label>
                             <select  name="region" class = "form-control" disabled > 
                                <option value = "">Choose an option</option>

                            <option value="Afar" <?php if ($fetch['region']=="Afar"){echo "selected";}?>>Afar</option>
                            <option value="oromia" <?php if ($fetch['region']=="oromia"){echo "selected";}?>>oromia</option>
                             <option value="Tigray" <?php if ($fetch['region']=="Tigray"){echo "selected";}?>>Tigray</option>
                              <option value="Amhara" <?php if ($fetch['region']=="Amhara"){echo "selected";}?>>Amhara</option>
                               <option value="Benishangul" <?php if ($fetch['region']=="Benishangul"){echo "selected";}?>>Benishangul</option>
                                <option value="Somali" <?php if ($fetch['region']=="Somali"){echo "selected";}?>>Somali</option>
                                 <option value="snnpr" <?php if ($fetch['region']=="snnpr"){echo "selected";}?>>snnpr</option>
                                   <option value="Sidama" <?php if ($fetch['region']=="Sidama"){echo "selected";}?>>Sidama</option>
                                     <option value="Addis Abeba" <?php if ($fetch['region']=="Addis Abeba"){echo "selected";}?>>Addis Abeba</option>

                            </select>
                        </div>

                        <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                            <label>zone </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['zone']?>" name = "zone" disabled />
                        </div>

                          <div class = "form-group" style="width: 40%;float:left;">
                            <label>woreda </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['woreda']?>" name = "woreda" disabled  />
                        </div>

                          <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                            <label>kebele </label>
                            <input type = "text" class = "form-control" value = "<?php echo $fetch['kebele']?>" name = "kebele" disabled />
                        </div>
                        <div class = "form-group" style="width: 40%;float:left;">

                        <label for="prisoner type">prisoner type</label>
                         <select  name="ptype" required="" class = "form-control">
                            <option value="permanent">permanent</option>
                              <option value="temporary">temporary</option>
                            </select>
                        </div>
                         
                        <div class = "form-group" style="width: 40%;float:left; margin-left:45px;">
                          <label for="stay">Time to stay</label>
                            <input type="number" name="stay" class="form-control" required="">
                           <select name="year" class="form-control" required="">
                           
                           
                           <option value="days">days</option>
                             <option value="month">Month</option>
                              <option value="year">Year</option>
                              </select>
                          </div>
                          <div class = "form-group" style="width: 40%;float:left;">
                            <label>Photo </label>
                            <div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
                                <img src = "../upload/image/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%" name = "photo"/>
                            </div>
                            <input type = "file" disabled id = "photo" />
                        </div>
                        <div class = "form-group" style="width: 30%; margin-left: 30%;">
                            <button name = "reRegisterPrisoner" class = "btn btn-warning form-control" onclick="return confirmation ();"><i class = "glyphicon glyphicon-edit"></i>Re Register</button>
                        </div>
                        <!--
                        <div class = "form-group">
                            <button name = "edit_prisoner" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
                        </div>-->
                    </form>
                  

                


                            
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
</script>

<script type="text/javascript">
     function confirmation()
    {
        var x =confirm("do you want to Re register prisoner ");
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



<?php
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['PrisonAdmin_logged'])) {
    header("location:../login.php");
  }

?>


<?php
  if(isset($_POST['create'])){
    $x=2/3;
    $address_id=$_POST['address_id'];
    //$password=$_POST['password'];

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
     $region=$_POST['region'];
    $zone=$_POST['zone'];
    $woreda=$_POST['woreda'];
    $kebele=$_POST['kebele'];
    $nationality=$_POST['nationality'];

    //$password1=$_POST['password1'];
    $crime_type=$_POST['crime_type'];
    //$date_field         = date('Y-m-d',strtotime($_POST['date_field']));
    //$Entry_Date=date('Y-m-d',strtotime($_POST['date']));

    //$checkout = date("Y-m-d", strtotime($Entry_Date."+".$stayy."MONTH"));

    $stay=$_POST['stay'];
    $stayy=$stay*$x;
    $year=$_POST['year'];
    //$tele=$_POST['rdate'];
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

  if ($age<18) {
   echo "<script>alert('please Enter Valid Age....Age must be greater 21')</script>";
  }
  else{  

   
        $sql="INSERT INTO address(address_id,region,zone,woreda, kebele,nationality,phone) VALUES ('$address_id','$region','$zone','$woreda','$kebele','$nationality','$tele')";
    //$sql="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('','$serial_no','$fname','$password','$account_type','1')";
    

    $query=mysqli_query($con,$sql);
        
    if ($query) {
      if ($year=="month") {
        //$sql1="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
        //$release_date="$Entry_Date,adddate('".date("Y-m-d")."',interval ".$stayy." month)";
        //$release_date=date("Y-m-d", strtotime(date("Y-m-d")."+".$days."MONTH"));
                         // $checkoutt = date("Y-m-d", strtotime($Entry_Date."+".$stayy."MONTH"));
        //$release_Date1="adddate('".$Entry_Date."',interval ".$stayy." month)";
       // $release_Date1=date('Y-m-d', strtotime($Entry_Date ."+".$stayy."month"));


       // $sql1="INSERT INTO prisoner(pid, address_id, fname, lname, sex, age,crime_type,photo,entry_date,release_date) VALUES ('','','$fname','$lname','$sex','$age','$crime_type','$photo','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." MONTH))";


        $sql="INSERT INTO `prisoner`(`pid`, `address_id`, `fname`, `lname`, `sex`, `age`, `crime_type`, `photo`, `entry_date`,`release_date`,`status`) VALUES ('','$address_id','".$fname."','".$lname."','".$sex."','".$age."','".$crime_type."','".$photo."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." month),'checkin')" ;

             $query1=mysqli_query($con,$sql);

             if ($query1 ) {
              $sqll="INSERT INTO `crime_record`(`crime_id`, `pid`, `crime_type`) VALUES ('','$address_id','".$crime_type."')" ;

              mysqli_query($con,$sqll);
         echo "<script>alert('registered sucessfully')</script>";

             }

               else{
             echo "<script>alert('not registereddddddddddddddddddd')</script>";
             echo "<script>alert('$query1')</script>";

                 }
              }

                else{

                  // $release_datee = "$Entry_Date,adddate('".date("Y-m-d")."',interval ".$stayy." year)";
                  //date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
                   //$release_datee=date("Y-m-d", strtotime(date("Y-m-d")."+".$days."YEAR"));
                  //$checkoutt = date("Y-m-d", strtotime($Entry_Date."+".$stayy."YEAR"));
              //$release_Date2=date('Y-m-d', strtotime($Entry_Date ."+".$stayy."year"));
                          //$release_Date2="adddate('".$Entry_Date."',interval ".$stayy." year)";



               //$sql="INSERT INTO prisoner(pid, address_id, fname, lname, sex, age,crime_type,photo,entry_date,release_date) VALUES ('','','$fname','$lname','$sex','$age','$crime_type','$photo','date("Y-m-d")','adddate('".date("Y-m-d")."',interval ".$stayy." year)')";

              $sql="INSERT INTO `prisoner`(`pid`, `address_id`, `fname`, `lname`, `sex`, `age`, `crime_type`, `photo`, `entry_date`,`release_date`,`status`) VALUES ('','$address_id','".$fname."','".$lname."','".$sex."','".$age."','".$crime_type."','".$photo."','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." year),'checkin')" ;


             $query=mysqli_query($con,$sql);
              if ($query) {
                $sqll="INSERT INTO `crime_record`(`crime_id`, `pid`, `crime_type`) VALUES ('','$address_id','".$crime_type."')" ;

                mysqli_query($con,$sqll);
              echo "<script>alert('sucessfully registered')</script>";
                      }
                  else{
             echo "<script>alert('not registered')</script>";

                            }





                }

            





         }



             else{
                   echo "<script>alert('not registered')</script>";

             }
                }

    
     

 //    else if ($account_type=="visitor") {
  //     $sql1="INSERT INTO `visitor_information`(`fname`, `lname`, `serial_no`, `sex`, `age`, `zone`,`photo`) VALUES ('".$fname."','".$mname."','".$serial_no."','".$sex."','".$age."','".$zone."','".$photo."')";
 //    $query1=mysqli_query($con,$sql1);
 //    if ($query1) {
 //     echo "<script>alert('registered sucessfully')</script>";
  //   }
  //   else{
 //     echo "<script>alert('not registered')</script>";
  //   }
 //     }   
    
   
   
   
    }
// }

else{

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




<style type="text/css">
    ul li ul.dropdown{
    min-width: 125px; /* Set width of the dropdown */
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

</style>


<style type="text/css">
    
input[type=text],[type=password],[type=number],[type=file] ,select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>






<script type="text/javascript">
     function confirmation()
    {
        var x =confirm("do you want to create account ");
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
<script type="text/javascript">
    var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

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
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                     <li class = "dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><?php echo $login_session;?></a>
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
                            <div class = "alert alert-info">Prisoner/Add new Prisoner</div>
                            <div class="table-responsive">
                                <table class="table">
                                    
             <div style="width: 50%;">
                    <form action="" method="post" enctype="multipart/form-data" >
                        <label for="address_id">ID</label>
                               <input type="number" id="address_id" name="address_id" placeholder="" required>

                            <label for="fname">First Name</label>
                               <input type="text" id="fname" name="fname" placeholder="Your name.." required>

                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

                         <label for="sex">sex</label>
                         <select id="sex" name="sex">
                            <option value="male">male</option>
                              <option value="female">female</option> </select>



                           <label for="age">age</label>
                           <input type="number" id="quantity" name="age" value="age" min="18" max="50">

                            <label for="tele">tele</label>
                           <input type="text" id="tele" name="tele" value="+251" pattern="[+]{1}[2]{1}[5]{1}[1]{1}[0-9]{9}" title="Must start with +251 , and followed by at most 9 numeric keys" required="">
                          
                           <label for="crime_type">crime type</label>
                         <select  name="crime_type" required="">
                            <option value="corruption">corruption</option>
                              <option value="rape">rape</option>
                     <option value="theaft">theaft</option>
                            </select>


                          


                         
                               <div class = "form-group">
                          <label for="stay">Time to stay</label>
                            <input type="number" name="stay" class="form-control" required="">
                             </div>
                            <div class = "form-group">
                           <select name="year" class="form-control" required="">
                             <option value="month">Month</option>
                              <option value="year">Year</option>
                              </select>
                          </div>

                           <label for="Region">Region</label>
                         <select  name="region" required="">
                            <option value="Amhara">Amhara</option>
                              <option value="Tigray">Tigray</option>
                              <option value="oromia">oromia</option>
                              <option value="Afar">Afar</option>
                              <option value="Somali">Somali</option>
                              <option value="Benishangul">Benishangul</option>
                              <option value="snnpr">snnpr</option>
                              <option value="Sidama">Sidama</option>
                              <option value="Addis Abeba">Addis Abeba</option>
                            </select>
                               
                               <label for="Zone">Zone</label>
                               <input type="text" id="zone" name="zone" placeholder="Your zone.." required>
                             
                           
                            


                            <label for="woreda">woreda</label>
                               <input type="text" id="woreda" name="woreda" placeholder="woreda" required>

                               <label for="kebele">kebele</label>
                               <input type="text" id="kebele" name="kebele" placeholder="kebele" required>







                            <label for="nationality">nationality</label>
                            <select  name="nationality" required="">
                            <option value="Ethiopian">Ethiopian</option>
                              <option value="">other</option>
                              
                             
                            </select>

                      
                                
                        <div class = "form-group">
                            <label>Photo </label>
                            <div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
                                <center id = "lbl">[Photo]</center>
                            </div>
                            <input type = "file" required = "required" 
                             name = "photo" />
                        </div>


                      



                      <div class = "form-group">
                            <button type="submit" name = "create" value="Create Account" class = "btn btn-info form-control" onclick="return confirmation ();"><i class = "glyphicon glyphicon-save "></i> Saved</button>
                        </div>

  </form>
</div>
          
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
</body>
</html>

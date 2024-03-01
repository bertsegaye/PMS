
<?php
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
  }

?>


<?php
  if(isset($_POST['create'])){
    $serial_no=$_POST['serial_no'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
    $password1=$_POST['password1'];
    $account_type=$_POST['user_type'];
    $photo=$_FILES["photo"]["name"];
    if ($_FILES['photo']['size'] != 0 ){
$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$photofile_name= addslashes($_FILES['photo']['name']);
move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);

// if (empty($fname) || empty($lname) || empty($serial_no)) {
// 	echo "<script>alert('image 2nd if')</script>";
//   echo "<font style='position:absolute; top:650px; left:900px;color:red; font-size:20px;'>please fill the form</font>";
// }
// else{

  if ($age<18) {
   echo "<script>alert('please Enter Valid Age Age must be greater 21')</script>";
  }
  else{  

  	if ($password==$password1) {
  		$sql="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
    //$sql="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('','$serial_no','$fname','$password','$account_type','1')";
    

    $query=mysqli_query($con,$sql);
        
    if ($query) {
    	//$sql1="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
    	$sql1="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('','$serial_no','$fname','$password','$account_type','1')";
    	     $query1=mysqli_query($con,$sql1);

             if ($query1 ) {
         echo "<script>alert('registered sucessfully')</script>";

             }
         }
             else{
             	   echo "<script>alert('not registered')</script>";

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
   
   
    else{
    echo "<script>alert('coniformation password is not correct!')</script>";
    }
    }
// }

  }

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
	<title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
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


<style type="text/css">


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
  width: 100%;
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
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
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
						<a href="profile.html" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
					</li>
					<li>
						<a href="basic-table.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Basic Table</a>
					</li>
					<li>
						<a href="fontawesome.html" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Icons</a>
					</li>
					<li>
						<a href="map-google.html" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Google Map</a>
					</li>
					<li>
						<a href="blank.html" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Blank Page</a>
					</li>
					<li>
						<a href="404.html" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Error 404</a>
					</li>
				</ul>
				<div class="center p-20">
					 <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a>
				 </div>
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
						<h4 class="page-title">Profile page</h4> </div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
						<ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li class="active">Profile Page</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<!-- .row -->
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="white-box">
							<div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
								<div class="overlay-box">
									<div class="user-content">
										<a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
										<h4 class="text-white">User Name</h4>
										<h5 class="text-white">info@myadmin.com</h5> </div>
								</div>
							</div>
							<div class="user-btm-box">
								<div class="col-md-4 col-sm-4 text-center">
									<p class="text-purple"><i class="ti-facebook"></i></p>
									<h1>258</h1> </div>
								<div class="col-md-4 col-sm-4 text-center">
									<p class="text-blue"><i class="ti-twitter"></i></p>
									<h1>125</h1> </div>
								<div class="col-md-4 col-sm-4 text-center">
									<p class="text-danger"><i class="ti-dribbble"></i></p>
									<h1>556</h1> </div>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="white-box">
						  
						<div>
					<form action="" method="post" enctype="multipart/form-data">
							<label for="fname">First Name</label>
							   <input type="text" id="fname" name="fname" placeholder="Your name.." required>

							<label for="lname">Last Name</label>
							<input type="text" id="lname" name="lname" placeholder="Your last name.." required>

						 <label for="sex">sex</label>
						 <select id="sex" name="sex">
							<option value="male">male</option>
							  <option value="female">female</option> </select>

							 <label for="serial_no">serial_no</label>
						   <input type="number" id="serial_no" name="serial_no" required>






						   <label for="age">age</label>
						   <input type="number" id="quantity" name="age" value="age" min="18" max="50">
						    <label for="tele">tele</label>
						   <input type="number" id="tele" name="tele" value="tele" >
						  
						   <label for="user_type">user_type</label>
						 <select  name="user_type" required="">
							<option value="admin">admin</option>
							  <option value="Reg_Officer">Reg_Officer</option>
					 <option value="commissioner">commissioner</option>
							</select>

						   <label for="password">password</label>
						
							<input type="password" name="password" class="form-control"  id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>





						 <label for="confirm">confirm password</label>
						 <input type="password" name="password1" class="form-control" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

						 
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>
						 <label for="myfile">Select a file:</label>
						<input type="file" name="photo" id = "photo">
				

					  <input type="submit" name="create" value="Create Account"  onclick="return confirmation ();">

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

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>

<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.js"></script>
<script src = "js/dataTables.bootstrap.js"></script>
</body>

</html>

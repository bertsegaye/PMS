<?php 
session_start();
include 'db/connection.php';
include 'main/backup.php';
if (isset($_POST['login'])){
   $_SESSION["username"] = $_POST["username"];
 $_SESSION["password"] = $_POST["password"];
 $_SESSION['last_time'] = time();
 
 if(!empty($_POST['username']) && !empty($_POST['password'])){
 $username = $_POST['username'];
 $password1 = $_POST['password'];
 /*$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password); */
$password = md5($password1); 

   

    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
if ($report>0) {
   while ($row= mysqli_fetch_assoc($query)) {
       $user_type=$row['account_type'];
       if ($user_type=="admin") {
      $_SESSION["admin_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
      $passwordd=$row['password'];
      $status=$row['status'];


     if($usernamee == $username && $passwordd == $password  && $status=='1')
 {
     header("Location:admin/index.php");
}
if($usernamee == $username && $passwordd == $password && $status=='0')
{
     echo "<script>
     alert(' account is deactivated contact your administrator!!!!!!!!!!!');
     window.location.href='login.php';
     </script>";}  }


       else if ($user_type=="Reg_Officer") {
      $_SESSION["reg_logged"] = "true";
    $_SESSION['id']=$row['id'];
    $_SESSION['serial_no']=$row['serial_no'];
     $usernamee=$row['username'];
 $passwordd=$row['password'];
 $status=$row['status'];
$_SESSION['username']=$usernamee;
     
     if($usernamee == $username && $passwordd == $password && $status=='1')
 {
     header("Location:Reg_officer/index.php");
}
if($usernamee == $username && $passwordd == $password && $status=='0')
{
     echo "<script>
     alert(' account is deactivated contact your administrator!!!!!!!!!!!');
     window.location.href='login.php';
     </script>";}
  }
  

  else if ($user_type=="storage_manager") {
  $_SESSION["strmgr_logged"] = "true";
   $_SESSION['id']=$row['id'];
   $_SESSION['serial_no']=$row['serial_no'];
    $usernamee=$row['username'];
$passwordd=$row['password'];
$status=$row['status'];
$_SESSION['username']=$usernamee;

    
    if($usernamee == $username && $passwordd == $password && $status=='1')
{
    header("Location:storage_manager/index.php");
}
if($usernamee == $username && $passwordd == $password && $status=='0')
{
     echo "<script>
     alert(' account is deactivated contact your administrator!!!!!!!!!!!');
     window.location.href='login.php';
     </script>";} }

 else if ($user_type=="prison_Admin") {
     $_SESSION["PrisonAdmin_logged"] = "true";
   $_SESSION['id']=$row['id'];
   $_SESSION['serial_no']=$row['serial_no'];
    $usernamee=$row['username'];
$passwordd=$row['password'];
$status=$row['status'];

    
    if($usernamee == $username && $passwordd == $password && $status=='1')
{
    header("Location:prison_Admin/index.php");
}

if($usernamee == $username && $passwordd == $password && $status=='0')
{
     echo "<script>
     alert(' account is deactivated contact your administrator!!!!!!!!!!!');
     window.location.href='login.php';
     </script>";}
 }


else if ($user_type=="Inf_Desk_Officer") {
     $_SESSION["ido_logged"] = "true";
   $_SESSION['id']=$row['id'];
   $_SESSION['serial_no']=$row['serial_no'];
    $usernamee=$row['username'];
$passwordd=$row['password'];
$status=$row['status'];
$_SESSION['username']=$usernamee;

    if($usernamee == $username && $passwordd == $password && $status=='1')
{
    header("Location:ido/index.php");
}
if($usernamee == $username && $passwordd == $password && $status=='0')
{
     echo "<script>
     alert(' account is deactivated contact your administrator!!!!!!!!!!!');
     window.location.href='login.php';
     </script>";     
    


}
 }





 }
}
else{
echo "<script>
alert(' incorrect password and/or username!');
window.location.href='index.php';
</script>";
}

   }else{
    echo "<script>
alert(' please insert username and password!');
;
</script>";
   }

} 
 
 ?>


<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PMS-login</title>
	
	
	<!--======================================================================-->
   <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--Menu CSS -->
    <!--<link href="../css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
     animation CSS -->
    <!--<link href="../css/css/animate.css" rel="stylesheet">
     Custom CSS -->
     <link href="css/css/style.css" rel="stylesheet">
    <!--color CSS -->
    <!--<link href="../css/css/colors/default.css" id="theme" rel="stylesheet">
    ======================================================================-->
    <link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="./css/footer.css">
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

	<style type="text/css">


		body{
		/*background-image: url('prison.jpg');*/
        background-position: absolute;
         background: #D4FAFC;

         
		}

.dropbt {
 
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.head{
	display: block;
	margin-bottom: 30px;
    height: 3px;
}
.head li i{
	color: black;
}
.login-but{
 margin-left: 5px;
 margin-bottom: 2px;
}
.login-but:hover{
	cursor: pointer;
	color: #3498db;
}
.container{
  display: none;
  margin-left: 100px;
  margin-top: 250px;
  background: #fff;
  width: 360px;
  padding: 30px;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
  border-radius: 0.5rem;
}

#homeimage{
	margin: 0px;
	padding: 0px;
}
.text-in{
	width: 100%;
	height: 500px;
	background-color: transparent;
    backface-visibility: 1;
	opacity: 1;
	
	font-size: 35px;
	text-align: center;
	margin-top: 0px;
	
}

.text-in .logo-text span h2{
	color: white;
	margin-top: 0px;
	font-weight: 100px;
}
.logo-text{
   color: black;
    display: flex;
}

.logo-text img{
   
    margin-bottom: 100px;
    border-radius: 50%;
    margin-left: 200px;
    
    }
.logo-text h2{
    margin-left: 20px;
    margin-top: 60px;
    color: green;
    display: block;
}
.left-text>ul>li{
font-size: 14px;
margin-left: 100px;
}

#vim{
    margin-right: 300px;
    margin-bottom: 20px;
}


   </style>


</head>
<table><tr><td>
<body>
	<div class="container1" style="border-bottom: 3px solid green;">
	


  <span id="logo"><b>Prison Managment System for Assosa</b></span>

	

   <div class="logout">
		&nbsp;<img src="user.png"  id="pp" >	
        <div  onclick="openForm()"  class="login-but">login</div>
	</div></div> 		



<div class="container" id="myForm" style="">
            <label for="show" class="fa fa-times" style="color: red; font-size: 2rem; float: right; cursor: pointer;" title="close" onclick="closeForm()"></label>
            <!--<div class="close-btn"><img src="./img/capture.png" width="20px" height="20px"></div>-->
            <div class="text" style="color:#3DED97">
               Login Form 
            </div>
            <form action="index.php" method="POST" onclick="return validation()">
               <div class="data" style="color:black;">
                  <label>User name</label>
                  <input type="text"  name="username"><p id="un"></p>
               </div>
               <div class="data" style="color:black">
                  <label>Password</label>
                  <input type="password"  name="password"><p id="ps"></p>
               </div>
               <div class="forgot-pass" style="margin-top:17px; color: #3498db; text-decoration-style: none;">
                  <a href="forgot_password/index.php" style="padding: 0.5rem; text-decoration: none;">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" name="login" style="color: #fff;">login</button>
                  
               </div>
               
            </form>
         </div>
      </div>


    
<div class="logo-text" style="margin-top: 100px;" >

    <img src="ppp.jpg" width="300" height="300">
    <nav class="left-text">
    <h2>Mission</h2> 
 <ul style="width:600px">
    <li>We actively engage in the development of effective criminal justice policy</li>
    <li>To manage offenders in a safe, secure and humane environment and provide opportunities for rehabilitation and reintegration.</li>
    <li>to protect society by maintaining offenders in safe and humane conditions while preparing them for successful reentry back into society.</li>
   
</ul>

 </nav>
</div>

<div class="logo-text">

    
    <div class="left-text" style="margin-top: -70px">
    <h2 style="margin-left:200px">Vission</h2> 
 <ul style="margin-left:200px">
  
   
    <li>We shall Reachout, Release, Renew, Rehabilitate, Reintegrate and Redeem prisoners.</li>
    <li>Embrace diversity and recognize the value and dignity of staff, inmates and the general public.</li>
</ul>

 </div>
 <img src="upload/image/prisn.jpg" width="300" height="300" id="vim">
</div>






<!--===========================script for translation=======================-->
<script src="css/lanscript.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<link rel="stylesheet" type="text/css" href="css/head.css">
</body>
</td></tr></table>
</html>
<?php 
include "./main/footer.php"
?>

<?php 
session_start();
include '../db/connection.php';
if (isset($_POST['login'])){
   $_SESSION["username"] = $_POST["username"];
 $_SESSION["password"] = $_POST["password"];
  

 $_SESSION['last_time'] = time();
 {
 if(!empty($_POST['username']) && !empty($_POST['password'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password); 
$password = md5($password); 

   if (empty($username) || empty($password)) {
 echo "<script>alert('please fill the form!')</script>";
}
else{
    $sql="SELECT * FROM users WHERE username='$username'";
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


     if($usernamee || $status=='1')
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

     
     if($usernamee == $username && $passwordd == $password && $status=='1')
 {
     header("Location:Reg_Officer/index.php");
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

    if($usernamee == $username && $passwordd == $password && $status=='1')
{
    header("Location:/ido/index.php");
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
window.location.href='login.php';
</script>";
}

   }

} 
 }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>WBCHMS for Assosa Correction House </title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="icon" type="image/png" href="Login_v4/images/icons/favicon.ico"/>
<!--===============================================================================================-->

     <link rel="icon" type="image/png" href="Login_v4/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/vendor/animate/animate.css">
<!--===============================================================================================-->   
     <link rel="stylesheet" type="text/css" href="Login_v4/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/vendor/select2/select2.min.css">
<!--===============================================================================================-->   
     <link rel="stylesheet" type="text/css" href="Login_v4/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="Login_v4/css/util.css">
     <link rel="stylesheet" type="text/css" href="Login_v4/css/main.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" type="text/css" href="Login_v4/css/util.css">
     <link rel="stylesheet" type="text/css" href="Login_v4/css/main.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand" style="margin-bottom: 15px; margin-left: 200px; font-size: 30px; font-style: oblique"> Wel come to Assosa Correction house</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <!--<li><a href="index.html">Home</a></li>
                         <li><a href="about-us.html">About Us</a></li>
                         <li><a href="team.html">Authors</a></li>
                         <li><a href="contact.html">Contact Us</a></li>
                         <li class="active"><a href="login.php">login</a></li>-->
                    </ul>
               </div>

          </div>
     </section>

     <!-- HOME -->
     <section id="home">
         
     </section>

     <main>
          <section>
               <div class="container" >
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">

                                   <br>
                                   <div class="row">
          <div class="col-md-offset-1 col-md-4 col-xs-12 pull-right">
            <img
              src="images/thhh (2).jpg"
              class="img-responsive img-circle"
              alt=""
            />
          </div>

          <div class="col-md-7 col-xs-12">
            <div class="about-info">

     
              <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="background-color: white;margin-left: 200px;">
                    <form action="login.php" class="login100-form validate-form" method="post" id="form">
                         <span class="login100-form-title p-b-49">
                              Login
                         </span>

                         <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                              <span class="label-input100" style="float: left;">Username</span>
                              <input class="input100" type="text" name="username" placeholder="Type your username">
                              <span class="focus-input100" data-symbol="&#xf206;"></span>
                         </div>

                         <div class="wrap-input100 validate-input" data-validate="Password is required" >
                              <span class="label-input100" style="float: left;">Password</span>
                              <input class="input100" type="password" name="password" placeholder="Type your password" minlength="8">
                              <span class="focus-input100" data-symbol="&#xf190;"></span>
                         </div>
                         
                         <div class="text-right p-t-8 p-b-31">
                              <a href="forgott.php">
                                   Forgot password?
                              </a>
                         </div>
                         
                         <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                   <div class="login100-form-bgbtn"></div>
                                   <button class="login100-form-btn" name="login" type="submit" value="login">
                                        Login
                                   </button>
                              </div>
                         </div>

                         <div class="txt1 text-center p-t-54 p-b-20">
                             
                         </div>

                   

                         
                    </form>
               </div>
            </div>
          </div>
        </div>







                              </div>
                         </div>
                    </div>
               </div>
          </section>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Mission  <small>We actively engage in the development of effective criminal justice policy</small></h2>
                              </div>
                         </div>

            

               

                    </div>
               </div>
          </section>
     </main>

     <!-- CONTACT -->
    

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Location</h2>
                              </div>
                              <address>
                                   <p>Benishangul <br>Assosa, 02 kebele</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2021 Assosa Correction House</p>
                                   <p>Developed by: <a href="team.html">Asu Computer science students</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+251 948020281</p>
                                   <p><a href="mailto:birhanu07dagnew@gmail.com">birhanu07dagnew@gmail.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="login.php">home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="login.php">login</a></li>
                                        <li><a href="about-us.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
            <div class="footer-info">
              <div class="section-title">
                <h2>Coworkers</h2>
              </div>
              <address>
                <p>Benishangul Regional courts</p>
                <p>
                  
                Federal high and supereme courts
                </p>
              </address>

              <div class="footer_menu">
                <h2>More About</h2>
                <ul>
                  <li><a href="about-us.html">Vision</a></li>
                  <li><a href="about-us.html">Mission</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
                    
               </div>
          </div>
     </footer>
            <div class="footer text-center"> 2021 &copy; Assosa Correction House , All Rights Reserved</div>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>


<script src="Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/vendor/bootstrap/js/popper.js"></script>
  <script src="Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/vendor/daterangepicker/moment.min.js"></script>
  <script src="Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="Login_v3/js/main.js"></script>
</body>
</html>


<?php
include '../db/connection.php';
include('session.php');
//session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
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
    $email=$_POST['email'];
    $tele=$_POST['tele'];
    $password1=$_POST['password1'];
    $account_type=$_POST['user_type'];
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
    $checkk = "SELECT * FROM users_info WHERE photo = '$photo'";
    $resultt = mysqli_query($con,$checkk);
    
      

    $check = "SELECT * FROM users WHERE serial_no = $serial_no";
    $result = mysqli_query($con,$check);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('erorr!!!!!!!! another user is registered in this id no');
        window.location.href='basic-table.php';
        </script>";
      } 

     
      else if (mysqli_num_rows($resultt) > 0) {
          echo "<script>
          alert('erorr!!!!!!!! check photo...this photo is registered to another user');
          window.location.href='basic-table.php';
          </script>";
        } 
        
  
  
        // check if e-mail address is well-formed
      else if ($age<18) {
            echo "<script>
            alert('erorr!!!!!!!! age should be >=18');
            window.location.href='basic-table.php';
            </script>";
        }
      

  else{  


    if ($password==$password1) {
/*
   
        $query = "SELECT * FROM users WHERE username = '$fname'";
        $result = mysqli_query($con,$query);
          if (mysqli_num_rows($result) > 0) {
            echo "<script>
            alert('change username!!!!!!!!!! another user is registered in this username');
            window.location.href='basic-table.php';
            </script>";
          } 
*/
      $sql="SELECT * from users_info where email='$email';";
      $res=mysqli_query($con,$sql);
      $sql1="SELECT * from users  where  username='$fname';";
      $ress=mysqli_query($con,$sql1);
      $sql2 = "SELECT * FROM users_info WHERE tele_no = '$tele'";
      $resss=mysqli_query($con,$sql2);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
       // $roww = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
		{
            echo "<script>
            alert('email  already exists');
            window.location.href='basic-table.php';
            </script>";
		}
  
	
		}
        
    

        else if (mysqli_num_rows($ress) > 0) {
        
            $roww = mysqli_fetch_assoc($ress);
           // $roww = mysqli_fetch_assoc($res);
            if($fname==isset($roww['username']))
            {
                echo "<script>
                alert('username  already exists');
                window.location.href='basic-table.php';
                </script>";
            }
      
        
            }

            else if (mysqli_num_rows($resss) > 0) {
        
                $rowww = mysqli_fetch_assoc($resss);
               // $roww = mysqli_fetch_assoc($res);
                if($tele==isset($rowww['tele_no']))
                {
                    echo "<script>
                    alert('tele no  already exists');
                    window.location.href='basic-table.php';
                    </script>";
                }
          
            
                }
          
          
          else {
$password = md5($password); 

        $sql="INSERT INTO users_info(
        serial_no,fname,  lname, sex, age,photo,tele_no,email) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele','$email')";
    //$sql="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('','$serial_no','$fname','$password','$account_type','1')";
    

    $query=mysqli_query($con,$sql);
        
    if ($query) {
        //$sql1="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
        $sql1="INSERT INTO users(id, serial_no, username, password, account_type, status) VALUES ('$serial_no','$serial_no','$fname','$password','$account_type','1')
        ";
             $query1=mysqli_query($con,$sql1);

             if ($query1 ) {
                echo "<script>
                alert(' user account created successfully');
                window.location.href='basic-table.php';
                </script>";
             }
         }
             else{
                   echo "<script>
                   alert(' not registered');
                   window.location.href='add_account.php';
                   </script>";

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
   
   
    else{
        echo "<script>
        alert('confirmation password not correct');
        window.location.href='add_account.php';
        </script>";    }
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
    <title>WBCHMS for Assosa Prison Managment System </title>
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
    
input[type=text],[type=password],[type=number],[type=file],[type=email],[type=date] ,select {
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
                            <div class = "alert alert-info">Account/create new account</div>
                            <div class="table-responsive">
                                <table class="table">
                                    
             <div style="width: 50%;">
                    <form action="" method="post" enctype="multipart/form-data">

                         <label for="serial_no">Serial No.</label>
                           <input type="number" id="serial_no" name="serial_no" max="999999999" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "9" required>
                            <label for="fname">First Name</label>
                               <input type="text" id="fname" name="fname" placeholder="Your name.." onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength = "20" required>

                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Your last name.." onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength = "20" required>

                         <label for="sex">sex</label>
                         <select id="sex" name="sex">
                            <option value="male">male</option>
                              <option value="female">female</option> </select>


                           <label for="age">Birth Date</label>
                           <!--<input type="number" id="quantity" name="age" value="age" min="18" max="150"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3"  >-->
                            <?php 
                        

          


                                    //$today = date('Y-m-d');                   
                          //$max_date=strtotime('$today - 18 year');
                                      $max_date = date('Y-m-d',strtotime('- 18 year'));              
                                      $min_date = date('Y-m-d',strtotime('- 150 year'));                   
             

  
                            ?>
                            <input type="date" name="age" max="<?php echo date($max_date) ?>" min="<?php echo date($min_date) ?>" >
                            <label for="tele">tele</label>
                            <input type="text" id="tele" name="tele" value="+251" pattern="[+]{1}[2]{1}[5]{1}[1]{1}[0-9]{9}" title="Must start with +251 , and followed by at most 9 numeric keys" required="">
                            
                            <label for="email">email</label>
                            <input type="text" id="email" name="email" pattern="[A-Z a-z0-9._%+-]+@[a-z0-9.-]+\.[com]{3}$" title="please insert correct email format" required> 


                           <label for="user_type">user_type</label>
                         <select  name="user_type" required="">
                            <option value="admin">Admin</option>
                            <option value="prison_Admin">prison_Admin</option>
                              <option value="Reg_Officer">Reg_Officer</option>
                                 <option value="Inf_Desk_Officer">inf_desk_officer</option>
                                 

                            </select>

                           <label for="password">password</label>
                        
                            <input type="password" name="password" class="form-control"  id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>




                         <label for="confirm">confirm password</label>
                         <input type="password" name="password1" class="form-control" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

                         
                            

                         <label for="photo">photo</label>
                        <div class = "form-group">
                            
                                <img id="preview" style = "width:150px; height :150px; border:1px solid #000;" src="#" />
                          
                            <input type = "file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png"  required = "required" 
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
            <footer class="footer text-center"> 2023 &copy; Assosa's Prison Managment System , All Rights Reserved</footer>
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



</body>


</html>

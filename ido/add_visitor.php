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


label{
  color: #0B2447;
}

</style>
<script type="text/javascript">
     function confirmation()
    {
        var x =confirm("do you want to register visitor ");
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
                    <h1 style="margin-top: 20px; font-size: 24px;"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 45px;"></i><br><b style="font-size: 17px; font-family: initial;">Information officer</b></h1>
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

            

                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
             <div class="container-fluid">
               
                <!-- /row -->
               
                            <div class = "alert alert-info"  style="width: 50%; 
    margin-left:350px; background-color: seagreen; margin-top: 50px; border-radius:0.5rem; color: black; font-size: 20px; height: px;"><b >Visitor/Register Visitor</b></div>
                            <div class="table-responsive">
                                <table class="table">
                                    
             <div class="formhead">
                    <form action="" method="post" enctype="multipart/form-data" style="color: black;">
                            

                        <div class="control-group">
                        <label class="control-label" for="inputEmail">Whom you want to visit</label>
                        <div class="controls">
                        <select name="pid"  id="qtype" required>
                        <?php
                        $sql1="select * from prisoner where status='checkin'";   
                          $sql1=mysqli_query($con,$sql1);
                          if($sql1)
                          {?>
                          <option value=""  selected="true" disabled="disabled">Select prisoner you want to visit</option>  <?php                   
                        while($row=mysqli_fetch_array($sql1))
                          {
                        ?>
                
                
                        <option value="<?php echo $row["fname"];?><?php echo " " ?><?php echo $row["lname"];?>"><?php echo $row["fname"];?><?php echo " " ?><?php echo $row["lname"];?>
                                

                      </option>

                        <?php
                          //$pid=$row["pid"];
                        }}
                        ?>
                        </select>

                                            </div></div>
                            
                                  <div class="control-group">
                                            <label class="control-label" for="inputEmail"></label>
                                            <div class="controls">          
                                                    <div id="opt11">
                                                        <input type = "text"  class = "form-control"  value = "<?php //echo $pid?>" hidden> 
                                                        </div>      
                                          </div>
         
                                            
                                        </div>
                            <label for="fname">First Name</label>
                               <input type="text" id="fname" name="fname" placeholder="Your name.." onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="20" required>

                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Your last name.." onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" maxlength="20" required>

                         <label for="sex">sex</label>
                         <select id="sex" name="sex">
                            <option value="male">male</option>
                              <option value="female">female</option> </select>

                             
                           <label for="age">age</label>
                           <input type="number" id="quantity" name="age" value="age" min="14" max="150" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                           <label for="tele">tele</label>
                            <input type="text" id="tele" name="tele" value="+251" pattern="[+]{1}[2]{1}[5]{1}[1]{1}[0-9]{9}" title="Must start with +251 , and followed by at most 9 numeric keys" required="">

                            <label for="photo">photo</label>
                        <div class = "form-group">
                            
                                <img id="preview" style = "width:150px; height :150px; border:1px solid #000;" src="#" />
                          
                            <input type = "file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png"  required = "required" 
                             name = "photo"  />
                        </div>

                        <label for="release_time">time in minute to stay in visit</label>
                           <input type="number" id="quantity" name="release_time" value="release_time" min="2" max="30">
                

                      

                      <div class = "form-group">
                            <button type="submit" name = "register" value="register visitor" class = "btn btn-info form-control" onclick="return confirmation ();"><i class = "glyphicon glyphicon-save "></i> Saved</button>
                        </div>

  </form>

</div>
                                </table>
                            </div>

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

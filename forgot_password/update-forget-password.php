
<?php

if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
include '../db/connection.php';
$emailId = $_POST['email'];
$token = $_POST['reset_link_token'];
$password = md5($_POST['password']);
$query = mysqli_query($con,"SELECT * FROM users_info JOIN users on users_info.serial_no=users.serial_no WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
     mysqli_query($con,"UPDATE users,users_info set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE users_info.serial_no =users.serial_no AND email='" . $emailId . "'");
 
// echo '<script>alert(" your password is updated Successfully")
//window.location.replace("login.php");
 //</script>';
 echo "<script>
 alert('password updated  successfully');
 window.location.href='../index.php';
 </script>";




}else{
	//echo '<script>alert("Something goes wrong. Please try again")</script>';
echo  "<script>
       swal('error occurred!', 'Something went wrong!', 'warning');
       
      
            </script>";
}
}
?>
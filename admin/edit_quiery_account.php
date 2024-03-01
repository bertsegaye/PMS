<?php   
include '../db/connection.php';
?>

<?php

if(ISSET($_POST['edit_account'])){
//echo "<script>alert('check')</script>";



    $password=$_POST['password'];
    $password=md5($password);

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
   $usernameee=$_POST['username'];


   $usernamee = stripslashes($usernameee);
$username = mysqli_real_escape_string($con,$usernamee);


    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
    $email=$_POST['email'];
    $account_type=$_POST['user_type'];
    //$photo=$_FILES["photo"]["name"];
//$photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
//$photofile_name= addslashes($_FILES['photo']['name']);
//move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);





$query = "SELECT * FROM users WHERE username = '$username' AND account_type !='$account_type'";
$result = mysqli_query($con,$query);

$query1 = "SELECT * FROM users WHERE username = '$username' AND account_type ='$account_type' AND serial_no = '$_REQUEST[admin_id]'";
$resultt = mysqli_query($con,$query1);
$query2 = "SELECT * FROM users WHERE username = '$username' AND account_type ='$account_type' AND serial_no != '$_REQUEST[admin_id]'";
$resulttt = mysqli_query($con,$query2);
$query3 = "SELECT * FROM users WHERE username = '$username' AND account_type !='$account_type' AND serial_no = '$_REQUEST[admin_id]'";
$resultttt = mysqli_query($con,$query3);
$query4 = "SELECT * FROM users WHERE username = '$username' AND account_type !='$account_type' AND serial_no = '$_REQUEST[admin_id]'";
$result4 = mysqli_query($con,$query4);

  $sql=" SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no where email='$email' AND account_type !='$account_type';";
  $res=mysqli_query($con,$sql);
  
  $sql2 = " SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no WHERE tele_no = '$tele' AND account_type !='$account_type'";
  $resss=mysqli_query($con,$sql2);

  if (mysqli_num_rows($res) > 1) {
    
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
    
else if (mysqli_num_rows($result4) > 0) {
  echo "<script>
  alert('change username!!!!!!!!!! another user is registered in this username');
  window.location.href='basic-table.php';
  </script>";
}

else if (mysqli_num_rows($result) > 0) {
  echo "<script>
  alert('change username!!!!!!!!!! another user is registered in this username');
  window.location.href='basic-table.php';
  </script>";
}
else if (mysqli_num_rows($resultt) > 1) {
  echo "<script>
  alert('change username!!!!!!!!!! another user is registered in this username');
  window.location.href='basic-table.php';
  </script>";
}
else if (mysqli_num_rows($resulttt) > 0) {
  echo "<script>
  alert('change username!!!!!!!!!! another user is registered in this username');
  window.location.href='basic-table.php';
  </script>";
}
else if (mysqli_num_rows($resultttt) > 1) {
  echo "<script>
  alert('change username!!!!!!!!!! another user is registered in this username');
  window.location.href='basic-table.php';
  </script>";
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
  
  else{
   
      $sql1="UPDATE users_info,users SET `fname` = '$fname', `lname` = '$lname',`sex` = '$sex',`age` = '$age',`tele_no` = '$tele',`email` = '$email', `username` = '$username',`password` = '$password',`account_type` = '$account_type' WHERE users_info.serial_no =users.serial_no AND users_info.serial_no = '$_REQUEST[admin_id]'" or die(mysqli_error());
    
    $query_result=mysqli_query($con,$sql1);

    if ($query_result) {
      
    echo "<script>
alert(' user information updated successfully');
window.location.href='basic-table.php';
</script>";

//header("location: basic-table.php");
}
}

    }

?>
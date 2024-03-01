<?php   
include '../db/connection.php';
?>

<?php

if(ISSET($_POST['edit_visitor'])){
//echo "<script>alert('check')</script>";

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $sex=$_POST['sex'];
    //$woreda=$_POST['woreda'];
    //$kebele=$_POST['kebele'];
    //$crime_type=$_POST['crime_type'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
    //$region=$_POST['region'];
    $photo=$_FILES["photo"]["name"];

      $sql1="UPDATE visitor SET `fname` = '$fname', `lname` = '$lname',`tele` = '$tele',`age` = '$age',`photo` = '$photo' WHERE visitor.vid  = '$_REQUEST[visitor_id]'" or die(mysqli_error());
    
    $query_result=mysqli_query($con,$sql1);

    if ($query_result) {
      
    echo "<script>
alert(' visitor information updated successfully');
window.location.href='manage-visitor.php';
</script>";

//header("location: basic-table.php");
}

    }

?>
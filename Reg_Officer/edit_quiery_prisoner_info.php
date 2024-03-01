<?php   
include '../db/connection.php';
?>

<?php

if(ISSET($_POST['edit_prisoner'])){
//echo "<script>alert('check')</script>";

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $zone=$_POST['zone'];
    $woreda=$_POST['woreda'];
    $kebele=$_POST['kebele'];
    $crime_type=$_POST['crime_type'];
    $age=$_POST['age'];
    $tele=$_POST['tele'];
    $region=$_POST['region'];
    //$photo=$_FILES["photo"]["name"];
   // $photofile= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    //$photofile_name= addslashes($_FILES['photo']['name']);
    //move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/image/" . $_FILES["photo"]["name"]);




      $sql1="UPDATE prisoner,address SET `fname` = '$fname', `lname` = '$lname',`crime_type` = '$crime_type',`phone` = '$tele',`age` = '$age',`zone` = '$zone',`woreda` = '$woreda',`kebele` = '$kebele',`region` = '$region' WHERE prisoner.address_id =address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
    $query_result=mysqli_query($con,$sql1);

    if ($query_result) {
      $sql11="UPDATE crime_record SET `crime_type` = '$crime_type' WHERE crime_record.pid = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
      $query_resultt=mysqli_query($con,$sql11);
      if($query_resultt){
    echo "<script>
alert(' prisoner information updated successfully');
window.location.href='basic-table.php';
</script>";
      }
      else{
        echo "<script>
        alert(' prisoner information not updated ');
        window.location.href='basic-table.php';
        </script>";
      }
//header("location: basic-table.php");
}
else{
  echo "<script>
  alert(' prisoner information not updatedddddddd ');
  window.location.href='basic-table.php';
  </script>";
}


    }

?>
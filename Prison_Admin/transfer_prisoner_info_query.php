<?php   
include '../db/connection.php';
?>

<?php
 
  //$sql="UPDATE prisoner SET `status` = 'transfered' WHERE prisoner.address_id =address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
 //$query_result=mysqli_query($con,$sql);   
if(ISSET($_POST['transfer_prisoner'])){
//echo "<script>alert('check')</script>";


$transferred_to=$_POST['transfer_to'];





$query = $con->query("SELECT * FROM prisoner where prisoner.address_id = '$_REQUEST[prisoner_id]'") or die(mysqli_error());
                            
//$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
//$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
$fetch = $query->fetch_array();

$fname=$fetch['fname'];
$lname=$fetch['lname'];
$crime_type=$fetch['crime_type'];
$age=$fetch['age'];
$sex=$fetch['sex'];
$photo=$fetch["photo"];

//$region=$_POST['region'];
///$photo=$_FILES["photo"]["name"];
$entry_date=$fetch['entry_date'];
$release_date=$fetch['release_date'];
//$address_id=$_POST['address_id'];

    $sql1="INSERT INTO `transfered_prisoner`(`tpid`, `address_id`, `fname`, `lname`, `sex`, `age`, `crime_type`, `photo`, `entry_date`,`release_date`,`status`,`transfered_to`) VALUES ('','$_REQUEST[prisoner_id]','$fname','$lname','$sex','$age','$crime_type','$photo','$entry_date','$release_date','transfered','$transferred_to')" ;
    $query_result=mysqli_query($con,$sql1);

    if ($query_result) {

        $sql="UPDATE prisoner SET `status` = 'transfered',`room_name` = '',`crime_status` = 'yes' WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
        $query_result1=mysqli_query($con,$sql);  
    if($query_result1){

        //$updatee="UPDATE prisoner SET WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
        //$query_updatee=mysqli_query($con,$updatee);  

        echo "<script>
        alert(' transferred prisoner successfully');
        window.location.href='transfer_prisoner.php';
        </script>";
    }
    }
else{
    echo "<script>
    alert(' not transferred something get wrong');
    window.location.href='transfer_prisoner.php';
    </script>";
}

} 
else{
    echo "<script>
    alert(' not working It does not get value');
    </script>";
}

?>
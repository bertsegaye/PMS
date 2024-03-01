<?php
include '../db/connection.php';
?>
    <?php
	// $sql1="DELETE users_info,users FROM users_info INNER JOIN users ON users_info.serial_no =users.serial_no WHERE users_info.serial_no = '$_REQUEST[admin_id]'" or die(mysqli_error());

	// $con->query("DELETE users_info,users FROM users_info INNER JOIN users ON users_info.serial_no =users.serial_no WHERE users_info.serial_no = '$_REQUEST[admin_id]'") or die(mysqli_error());
	//$sql1="DELETE FROM users_info,users WHERE users_info.serial_no =users.serial_no AND users_info.serial_no = '$_REQUEST[admin_id]'" or die(mysqli_error());
	/*$sql1="DELETE from users_info WHERE users_info.serial_no='$_REQUEST[admin_id]'";
      $query1=mysqli_query($con,$sql1);
      if ($query1) {
		$sql2="DELETE from users where users.serial_no='$_REQUEST[admin_id]'";
	   $query2=mysqli_query($con,$sql2);
	   if ($query2) {
		echo "<script>alert('sucessfully deleted');</script>";
      header("location: basic-table.php");
	  
	}
}
else{

echo "<script>alert('error occurred');</script>";
      

}
*/
// $con->query("DELETE FROM users_info,users WHERE users_info.serial_no =users.serial_no AND users_info.serial_no = '$_REQUEST[admin_id]'") or die(mysqli_error());


if(isset($_GET['prisoner_id'])){

$id=$_GET['prisoner_id'];
$sql = "DELETE FROM address WHERE address_id = $id";
mysqli_query($con, $sql);
$sqll = "DELETE FROM prisoner WHERE address_id = $id";
$query=mysqli_query($con, $sqll);
//echo "<script>alert('you successfully delete the user ')</script>";
if ($query) {
	echo "<script>
alert('prisoner deleted successfully');
window.location.href='basic-table.php';
</script>";

//header("location: basic-table.php");
}


}







	 //$query_result=mysqli_query($con,$sql1);
      //echo "<script>alert('check')</script>";
		//$query_result=mysqli_query($con,$sql1);
	 
	 
//$query = "DELETE students, progress from students inner join progress on progress.RegNo=students.RegNo where students.ProjectID='$id';DELETE FROM projects where projects.ProjectID='$id'";



	//$sql1="UPDATE users_info,users SET `fname` = '$fname', `lname` = '$lname',`sex` = '$sex',`age` = '$age',`photo` = '$photo', `username` = '$username',`password` = '$password',`account_type` = '$account_type' WHERE users_info.serial_no =users.serial_no AND users_info.serial_no = '$_REQUEST[admin_id]'" or die(mysqli_error());
	 ?>

	 
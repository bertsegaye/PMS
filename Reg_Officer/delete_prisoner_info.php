<?php
include '../db/connection.php';
?>
    <?php

	$id=$_REQUEST['address_id'];
	$sql2="delete from prisoner where address_id='$id'";
	$query2=mysqli_query($con,$sql2);
	if ($query2) {
		$sql3="delete from address where address_id='$id'";
	$query3=mysqli_query($con,$sql3);
	if($query3){
		$sql4="delete from crime_record where pid='$id'";
	$query4=mysqli_query($con,$sql4);
	
	if ($query4) {
	
		echo "<script>
alert('prisoner deleted successfully');
window.location.href='basic-table.php';
</script>";


	}
	else{
		echo "<script>
		alert('prisoner not deleted');
		window.location.href='basic-table.php';
		</script>";
	}
}
else{
	echo "<script>
	alert('prisoner crime record not deleted');
	window.location.href='basic-table.php';
	</script>";
}
	}
	else{

		echo "<script>
		alert('uknown');
		window.location.href='basic-table.php';
		</script>";
		}
	



























	 //$query_result=mysqli_query($con,$sql1);
      //echo "<script>alert('check')</script>";
		//$query_result=mysqli_query($con,$sql1);
	 
	 
//$query = "DELETE students, progress from students inner join progress on progress.RegNo=students.RegNo where students.ProjectID='$id';DELETE FROM projects where projects.ProjectID='$id'";



	//$sql1="UPDATE users_info,users SET `fname` = '$fname', `lname` = '$lname',`sex` = '$sex',`age` = '$age',`photo` = '$photo', `username` = '$username',`password` = '$password',`account_type` = '$account_type' WHERE users_info.serial_no =users.serial_no AND users_info.serial_no = '$_REQUEST[admin_id]'" or die(mysqli_error());
	 ?>

	 
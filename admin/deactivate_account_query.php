
<?php
include '../db/connection.php';
?>
    <?php
	$id=$_REQUEST['id'];
$sql = "UPDATE users SET status = '0' where serial_no = '$id'";
$query=mysqli_query($con, $sql);
if ($query) {
	echo "<script>
alert('User Account has been deactivated');
window.location.href='account_deactivate.php';
</script>";

//header("location: basic-table.php");
}
else{
	echo "<script>
	alert('error...try again');
	window.location.href='account_deactivate.php';
	</script>";
}







	 ?>
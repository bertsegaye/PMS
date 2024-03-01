

<?php
include '../db/connection.php';
?>
    <?php
	$id=$_REQUEST['id'];
$sql = "UPDATE users SET status = '1' where serial_no = '$id'";
$query=mysqli_query($con, $sql);
if ($query) {
	echo "<script>
alert('User Account has been Activated');
window.location.href='account_activate.php';
</script>";

//header("location: basic-table.php");
}
else{
	echo "<script>
	alert('error...try again');
	window.location.href='account_activate.php';
	</script>";
}







	 ?>
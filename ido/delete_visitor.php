<?php
include '../db/connection.php';
?>
    <?php

	$id=$_REQUEST['visitor_id'];

		$sql="delete from visitor where vid='$id'";
	$query=mysqli_query($con,$sql);
	if ($query) {
	
		echo "<script>
alert('visitor information deleted successfully');
window.location.href='manage-visitor.php';
</script>";


	}
	else{
		echo "<script>
		alert('visitor information  not deleted');
		window.location.href='basic-table.php';
		</script>";
	}
	

	 ?>

	 
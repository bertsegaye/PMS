<?php
include '../db/connection.php';
$query = $con->query("SELECT * FROM prisoner where prisoner.pid = '$_REQUEST[pid]'") or die(mysqli_error());
$fetch = $query->fetch_array();
$prisoner_type=$fetch['prisoner_type'];

//$time = date("H:i:s", strtotime("+8 HOURS"));
if($prisoner_type=='permanent'){
	$con->query("UPDATE `prisoner` SET `status` = 'CheckOut',`room_name` = '',`crime_status` = 'yes' WHERE `pid` = '$_REQUEST[pid]'") or die(mysqli_error());
	header("location:checkout.php");
}
else if($prisoner_type=='temporary'){
	$con->query("UPDATE `prisoner` SET `status` = 'InCourt' WHERE `pid` = '$_REQUEST[pid]'") or die(mysqli_error());
	header("location:checkout.php");	
}
else{
	echo "<script>
	alert(' something went wrong');
	window.location.href='checkout.php';
	</script>";	
}
?>
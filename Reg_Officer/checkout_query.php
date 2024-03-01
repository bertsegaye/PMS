<?php
include '../db/connection.php';
//$time = date("H:i:s", strtotime("+8 HOURS"));
	$con->query("UPDATE `prisoner` SET `status` = 'CheckOut' WHERE `pid` = '$_REQUEST[pid]'") or die(mysqli_error());
	header("location:checkout.php");
?>
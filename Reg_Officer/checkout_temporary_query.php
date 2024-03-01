
<?php
include '../db/connection.php';


$sql="UPDATE `prisoner` SET `status` = 'CheckOut',`room_name` = '' WHERE `pid` = '$_REQUEST[pid]'" or die(mysqli_error());
$queryy=mysqli_query($con,$sql);

if($queryy){

	echo "<script>
	alert(' prisoner freely released from the correction house');
	window.location.href='checkout_reg.php';
	</script>";	
}
?> 
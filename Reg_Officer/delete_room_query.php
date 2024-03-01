
<?php

include '../db/connection.php';
session_start();

?>
    <?php


$id=$_GET['room_name'];
$gender=$_SESSION['gender'];
    $check = "SELECT * FROM prisoner WHERE (room_name = '$id' AND sex='$gender')";
    $result = mysqli_query($con,$check);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('there are prisoners in ths room....in order to remove this room assign another room for them!!!!');
        window.location.href='view_room.php';
        </script>";
      } 


else{
	$sql2="delete from room where room_name='$id' AND gender = '$gender'";
	$query2=mysqli_query($con,$sql2);

	
	if ($query2) {
	
		echo "<script>
alert('room deleted successfully');
window.location.href='view_room.php';
</script>";


	}
	else{
		echo "<script>
		alert('room not  deleted');
		window.location.href='view_room.php';
		</script>";
	}
}
	

	 ?>

	 
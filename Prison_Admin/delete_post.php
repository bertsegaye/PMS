<?php
include '../db/connection.php';
?>
    <?php

if(isset($_GET['id'])){

$id=$_GET['id'];
$sql = "DELETE FROM announcement WHERE id = $id";
$query=mysqli_query($con, $sql);
if ($query) {
	echo "<script>
alert('post deleted successfully');
window.location.href='view_post.php';
</script>";

//header("location: basic-table.php");
}


}



	 ?>

	 
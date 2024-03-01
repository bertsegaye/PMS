<?php
include '../db/connection.php';

session_start();
// Storing Session
$user_check = $_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT username,photo from users_info JOIN users on users_info.serial_no=users.serial_no  where username = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
$photo_session = $row['photo'];

if(isset($_SESSION['username']))
{
 if((time() - $_SESSION['last_time']) > 900) // Time in Seconds
 {
 header("location:logout.php");
 }
 else
 {
 $_SESSION['last_time'] = time();
 }
}
else
{
 header('Location:../login.php');
}
?>

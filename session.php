<?php
//session_start();
include '../database/configdb.php';
// Storing Session
$user_check = $_SESSION['un'];
$user_id = $_SESSION['id'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT username, picture FROM account WHERE username = '$user_check' AND user_id='$user_id'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
$photo_session = $row['picture'];

if(isset($_SESSION['un']))
{
 if((time() - $_SESSION['last_time']) > 1000) // Time in Seconds
 {
 header("location:../Main/logout.php");
 }
 else
 {
 $_SESSION['last_time'] = time();
 }
}
else
{
 header('location:../index.php');
}
?>

 <?php 
 include '../main/backup.php';
session_start();
session_destroy(); 
header("Location:../index.php")
?>
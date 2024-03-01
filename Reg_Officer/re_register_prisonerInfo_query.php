<?php   
include '../db/connection.php';
?>

<?php
 
  //$sql="UPDATE prisoner SET `status` = 'transfered' WHERE prisoner.address_id =address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
 //$query_result=mysqli_query($con,$sql);   
if(ISSET($_POST['reRegisterPrisoner'])){
//echo "<script>alert('check')</script>";

//$x=2/3;
$crime_type=$_POST['crime_type'];
//$release_date=$_POST['release_date'];
//$age=$_POST['age'];
$prisoner_type=$_POST['ptype'];
$stay=$_POST['stay'];
//$stayy=$stay*$x;
$year=$_POST['year'];

$query = $con->query("SELECT * FROM prisoner where prisoner.address_id = '$_REQUEST[prisoner_id]'") or die(mysqli_error());
                            
//$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
//$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
$fetch = $query->fetch_array();
$address_id=$fetch['pid'];

  
 
    
   
         
       if ($year=="month") {
         //$sql1="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
         //$release_date="$Entry_Date,adddate('".date("Y-m-d")."',interval ".$stayy." month)";
         //$release_date=date("Y-m-d", strtotime(date("Y-m-d")."+".$days."MONTH"));
                          // $checkoutt = date("Y-m-d", strtotime($Entry_Date."+".$stayy."MONTH"));
         //$release_Date1="adddate('".$Entry_Date."',interval ".$stayy." month)";
        // $release_Date1=date('Y-m-d', strtotime($Entry_Date ."+".$stayy."month"));
 
 
        // $sql1="INSERT INTO prisoner(pid, address_id, fname, lname, sex, age,crime_type,photo,entry_date,release_date) VALUES ('','','$fname','$lname','$sex','$age','$crime_type','$photo','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." MONTH))";
 
 
        $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`crime_type` = '$crime_type',`status` = 'checkin',`prop_status` = '',`entry_date`='".date("Y-m-d")."',`release_date`= adddate('".date("Y-m-d")."',interval ".$stay." month) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
 
              $query1=mysqli_query($con,$sql);
 
              if ($query1 ) {
                $sqll="INSERT INTO `crime_record`(`crime_id`, `pid`, `crime_type`) VALUES ('','$address_id','".$crime_type."')" ;

                mysqli_query($con,$sqll);
               echo "<script>
               alert(' prisoner information registered sucessfully ');
               window.location.href='basic-table.php';
               </script>";    
              }
 
                else{
              echo "<script>alert('not registereddddddddddddddddddd')</script>";
              echo "<script>alert('$query1')</script>";
 
                  }
            
               }
 
  
               else if ($year=="days") {
                 //$sql1="INSERT INTO users_info(serial_no,fname,  lname, sex, age,photo,tele_no) VALUES ('$serial_no','$fname','$lname','$sex','$age','$photo','$tele')";
                 //$release_date="$Entry_Date,adddate('".date("Y-m-d")."',interval ".$stayy." month)";
                 //$release_date=date("Y-m-d", strtotime(date("Y-m-d")."+".$days."MONTH"));
                                  // $checkoutt = date("Y-m-d", strtotime($Entry_Date."+".$stayy."MONTH"));
                 //$release_Date1="adddate('".$Entry_Date."',interval ".$stayy." month)";
                // $release_Date1=date('Y-m-d', strtotime($Entry_Date ."+".$stayy."month"));
         
         
                // $sql1="INSERT INTO prisoner(pid, address_id, fname, lname, sex, age,crime_type,photo,entry_date,release_date) VALUES ('','','$fname','$lname','$sex','$age','$crime_type','$photo','".date("Y-m-d")."',adddate('".date("Y-m-d")."',interval ".$stayy." MONTH))";
         
         
                $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`crime_type` = '$crime_type',`status` = 'checkin',`prop_status` = '',`entry_date`='".date("Y-m-d")."',`release_date`= adddate('".date("Y-m-d")."',interval ".$stay." day) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
         
                      $query1=mysqli_query($con,$sql);
         
                      if ($query1 ) {
                        $sqll="INSERT INTO `crime_record`(`crime_id`, `pid`, `crime_type`) VALUES ('','$address_id','".$crime_type."')" ;

                        mysqli_query($con,$sqll);
                       echo "<script>
                       alert(' prisoner information registered sucessfully ');
                       window.location.href='basic-table.php';
                       </script>";    
                      }
         
                        else{
                   
 
                      echo "<script>
                      alert(' not registereddddddddddddddddddd ');
                      window.location.href='add_account.php';
                      </script>";  
         
                          }
                       }
 
                 else{
 
                   // $release_datee = "$Entry_Date,adddate('".date("Y-m-d")."',interval ".$stayy." year)";
                   //date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
                    //$release_datee=date("Y-m-d", strtotime(date("Y-m-d")."+".$days."YEAR"));
                   //$checkoutt = date("Y-m-d", strtotime($Entry_Date."+".$stayy."YEAR"));
               //$release_Date2=date('Y-m-d', strtotime($Entry_Date ."+".$stayy."year"));
                           //$release_Date2="adddate('".$Entry_Date."',interval ".$stayy." year)";
 
 
 
                //$sql="INSERT INTO prisoner(pid, address_id, fname, lname, sex, age,crime_type,photo,entry_date,release_date) VALUES ('','','$fname','$lname','$sex','$age','$crime_type','$photo','date("Y-m-d")','adddate('".date("Y-m-d")."',interval ".$stayy." year)')";
 
                $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`crime_type` = '$crime_type',`status` = 'checkin',`prop_status` = '',`entry_date`='".date("Y-m-d")."',`release_date`= adddate('".date("Y-m-d")."',interval ".$stay." year) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
 
 
              $query=mysqli_query($con,$sql);
               if ($query) {
                $sqll="INSERT INTO `crime_record`(`crime_id`, `pid`, `crime_type`) VALUES ('','$address_id','".$crime_type."')" ;

                mysqli_query($con,$sqll);
                 echo "<script>
                 alert(' prisoner information registered sucessfully ');
                 window.location.href='basic-table.php';
                 </script>";                          }
                   else{
              echo "<script>alert('not registered something went wrong')</script>";
 
                             }
 
 
 
 
 
                 }
 
             
 
 
 
 
 
          
 
 
 
                 
                }


?>
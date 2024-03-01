<?php   
include '../db/connection.php';
?>

<?php
 
  //$sql="UPDATE prisoner SET `status` = 'transfered' WHERE prisoner.address_id =address.address_id AND prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
    
 //$query_result=mysqli_query($con,$sql);   
if(ISSET($_POST['reRegisterPrisoner'])){
//echo "<script>alert('check')</script>";

//$x=2/3;

$prisoner_type=$_POST['ptype'];
$stay=$_POST['stay'];
//$stayy=$stay*$x;
$year=$_POST['year'];

$query = $con->query("SELECT * FROM prisoner where prisoner.address_id = '$_REQUEST[prisoner_id]'") or die(mysqli_error());
                            
//$query = $con->query("SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no")or die(mysqli_error());
//$query = $con->query("SELECT * FROM `login` WHERE `id` = '$_GET[admin_id]'") or die(mysqli_error());
$fetch = $query->fetch_array();
$address_id=$fetch['pid'];
$release_date=$fetch['release_date'];
$entry_date=$fetch['entry_date'];



  
 
    if($prisoner_type=='temporary'){
   
         
       if ($year=="month") {
        
 
        $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$release_date."',interval ".$stay." month) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
 
              $query1=mysqli_query($con,$sql);
 
              if ($query1 ) {
             
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

         
         
                $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$release_date."',interval ".$stay." day) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
         
                      $query1=mysqli_query($con,$sql);
         
                      if ($query1 ) {
                  
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

 
                    $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$release_date."',interval ".$stay." year) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
 
 
              $query=mysqli_query($con,$sql);
               if ($query) {
        
                 echo "<script>
                 alert(' prisoner information registered sucessfully ');
                 window.location.href='basic-table.php';
                 </script>";                          }
                   else{
              echo "<script>alert('not registered something went wrong')</script>";
 
                             }
 
 
 
 
 
                 }

                }

                else if($prisoner_type=='permanent'){



                    if ($year=="month") {
        
 
                        $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$entry_date."',interval ".$stay." month) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
                 
                              $query1=mysqli_query($con,$sql);
                 
                              if ($query1 ) {
                             
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
                
                         
                         
                                $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$entry_date."',interval ".$stay." day) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
                         
                                      $query1=mysqli_query($con,$sql);
                         
                                      if ($query1 ) {
                                  
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
                
                 
                                    $sql="UPDATE prisoner SET `prisoner_type` = '$prisoner_type',`status` = 'checkin',`release_date`= adddate('".$entry_date."',interval ".$stay." year) WHERE prisoner.address_id = '$_REQUEST[prisoner_id]'" or die(mysqli_error());
                 
                 
                              $query=mysqli_query($con,$sql);
                               if ($query) {
                        
                                 echo "<script>
                                 alert(' prisoner information registered sucessfully ');
                                 window.location.href='basic-table.php';
                                 </script>";                          }
                                   else{
                              echo "<script>alert('not registered something went wrong')</script>";
                 
                                             }

                 
                                 }
         


                }
                else{
                    echo "<script>
                    alert(' prisoner information not registered.......something went wrong ');
                    window.location.href='basic-table.php';
                    </script>";  
                }

            }

             
                


?>
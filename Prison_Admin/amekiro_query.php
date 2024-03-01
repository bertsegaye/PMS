<?php include '../db/connection.php';?>
<?php




                
/*
//difference between two dates
$diff = date_diff($date1,$date2);

//count days
//$diff->format("%a days");
$difff=$diff->format("%a days");

echo $difff;



$date1 = "2016-07-31";
$date2 = "2016-08-05";
*/
$query = $con->query("SELECT * from prisoner JOIN address on address.address_id=prisoner.address_id where prisoner.pid = '$_REQUEST[pid]' ") or die(mysqli_error());
$fetch = $query->fetch_array();

$entry_date=$fetch['entry_date'];
$release_date=$fetch['release_date'];

function dateDiff($entry_date, $release_date)
{
  
    $date1_ts = strtotime($entry_date);
    $date2_ts = strtotime($release_date);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

$dateDiff = dateDiff($entry_date, $release_date);

//printf("Difference between in two dates : " . $dateDiff . " Days ");
//print "</br>";
$multiply=1/3;
$dateDifff=dateDiff($entry_date, $release_date)* $multiply;
$dateDiffff=round($dateDifff);
//printf("minused date from release date : " . $dateDiffff . " Days ");
//print "</br>";

//echo $newDate;

$newDate = strtotime($release_date . '- '.$dateDiffff.'days');
//echo  $release_date; //format new date
//print "</br>";

$update_date=Date('Y-m-d', $newDate); //format new date 
//echo $update_date;



$multiplyy=1/2;
$dateDifff1=dateDiff($entry_date, $release_date)* $multiplyy;
$dateDiffff1=round($dateDifff1);
         
$today = date('Y-m-d');                   
$half_datee = strtotime($entry_date . '+ '.$dateDiffff1.'days');
$half_date=Date('Y-m-d', $half_datee); 

if($today >= $half_date){
    $date_sql="UPDATE `prisoner` SET `release_date` = '".$update_date."',`amekiro_gain`='yes' WHERE `pid` = '$_REQUEST[pid]'" or die(mysqli_error());
    $query_date=mysqli_query($con,$date_sql);
    if($query_date){
        echo "<script>
        alert(' amekiro service gived successfully  . $dateDiffff . days are minused from the prisoner release date');
        window.location.href='basic-table.php';
        </script>";
    
    }
    else{
        echo "<script>
        alert(' amekiro service not gived ');
        window.location.href='basic-table.php';
        </script>";   
    }
}
else{
    //$half_datee = strtotime($half_date . '- '.$dateDiffff1.'days');
//$half_date=Date('Y-m-d', $half_datee); 

    echo "<script>
    alert(' Not Given......$half_date.....inorder to get amekiro service the prisoner should stay 1/2 or more of his time in correction house ');
    window.location.href='amekiro.php';
    </script>";   

}



?>
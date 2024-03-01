<?php   
include '../db/connection.php';
?>

<?php

if(ISSET($_POST['edit_room'])){
//echo "<script>alert('check')</script>";

    $room_name=$_POST['room_name'];
    //$gender=$_POST['gender'];

    //$room_id=$_POST['room_id'];




    $check = "SELECT * FROM room WHERE room_name = '$room_name' AND room_name !='$_GET[room_name]'";
    $result = mysqli_query($con,$check);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('no two rooms have the same name');
        window.location.href='view_room.php';
        </script>";
      } 

else{
      $sql1="UPDATE room SET room_name = '$room_name' where room.room_name = '$_GET[room_name]'" or die(mysqli_error());

      $query_result=mysqli_query($con,$sql1);
      if($query_result){
        $sql11="UPDATE prisoner SET room_name = '$room_name' where prisoner.room_name = '$_GET[room_name]'" or die(mysqli_error());

        $query_resultt=mysqli_query($con,$sql11);
        if($query_resultt){
          echo "<script>
          alert(' room updated successfully ');
          window.location.href='view_room.php';
          </script>";
        }
      
      else{
        echo "<script>
        alert(' room not updated ');
        window.location.href='view_room.php';
        </script>";
      }

    }
    else{
      echo "<script>
      alert(' room not updateddddddddd ');
      window.location.href='view_room.php';
      </script>";
    }
  }
  }
  
?>
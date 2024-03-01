
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
    include '../db/connection.php';
    //error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['password-reset-token']) && $_POST['email'])
{

     
    $emailId = $_POST['email'];
 
    $result = mysqli_query($con,"SELECT * from users_info JOIN users on users_info.serial_no=users.serial_no WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = base64_encode($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s", $expFormat);
 //$password=$_POST['password'];
 $update = mysqli_query($con,"UPDATE users_info,users set  reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "' AND users_info.serial_no =users.serial_no");
 
 
    $link = "<a 
    href='10.16.201.44/PMS/forgot_password/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

    
    $mail = new PHPMailer(true);
  $mail->isSMTP();    
                                          //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bireces07@gmail.com';                     //SMTP username
    $mail->Password   = 'uupxsbvqhacdygea';                               //SMTP password
          //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bireces07@gmail.com', 'PMS_by_Weakend_ASU_CS_GC_2015/23');
    $mail->addAddress($emailId);     //Add a recipient
   
    $mail->addReplyTo('no-reply@gmail.com', 'no reply');
    $mail->IsHTML(true);
    $mail->Subject    = 'reset-password  ';
    $mail->Body    = 'Click On This Link to Reset Your Password '.$link.'';
    
    if($mail->Send())
    {

     // echo '<script>alert(" Email sent successfully!  Click on the link sent to your email")
      //</script>';
//echo "<script>
//window.setTimeout(function(){ window.location.href = 'login.php';

  // }, 1000);
    //     </script>";


    echo "<script>
    alert('A reset password link is sent successfully to your email!  please visit your email');
    window.location.href='../index.php';
    </script>";
   

     
    }
    else
    {

      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "<script>
    alert('Email not exist');
   window.location.href='index.php';
    </script>";
           //echo '<script>alert("Email is not registered! Please enter a vaild email address")
      
          //  </script>';
 //echo "<script>
//window.setTimeout(function(){ window.location.href = 'login.php';

  //  }, 1000);
    //     </script>";

    //echo '<script>alert("Invalid Email Address")window.location.replace("forgott.php");</script>';
  }
}

?>

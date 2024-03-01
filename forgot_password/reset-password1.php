<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="width: 20rem; margin-left: -1rem;">
<div class="card">
<div class="card-header text-center">
<b>Reset Password Form</b>
</div>
<div class="card-body">
<?php
if($_GET['key'] && $_GET['token'])
{
include '../db/connection.php';
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($con,"SELECT * FROM users_info JOIN users on users_info.serial_no=users.serial_no WHERE `reset_link_token`='".$token."' and `email`='".$email."'"
);
$curDate = date("Y-m-d H:i:s");
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['exp_date'] >= $curDate){ ?>
<form action="update-forget-password.php" method="POST" style="width: 16rem;">
<input type="hidden" name="email" value="<?php echo $email;?>">
<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
<div class="form-group">
<label for="exampleInputEmail1">New Password</label>
<input type="password" name='password' id="password" class="form-control"  title="your password must be greaterthan 8 digits and must contain Uppercase and Lowercase" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
</div>                
<div class="form-group">
<label for="exampleInputEmail1">Confirm Password</label>
<input type="password" name="cpassword" oninput="check(this)" class="form-control"  title="your password must be greaterthan 8 digits and must contain Uppercase and Lowercase" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('password is not matched!.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }

    }
</script>
</div>
<input type="submit" name="new-password" class="btn btn-primary">
</form>
<?php } } else{
echo "This forget password link has been expired";
}
}
?>
</div>
</div>
</div>
</body>
</html>
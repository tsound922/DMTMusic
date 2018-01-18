<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['password'])&&isset($_POST['password_again'])){

           $password = $_POST['password'];
           $password_again = $_POST['password_again'];

           if(!empty($password)&&!empty($password_again)){
             if($password==$password_again){
              $exist =  mysqli_query($conn, "SELECT * FROM user WHERE username ='".$_SESSION['user_name']."'");
                     if(mysqli_num_rows($exist)!=0){
                        mysqli_query($conn, "UPDATE user SET password='$password' WHERE username= '".$_SESSION['user_name']."'");
                          echo "<div class='container' align='center'><div class='alert alert-success'>
                      Your Password Update is <strong>Success!</strong>
                      </div></div>";
                      header('refresh:2; url=index.php');
                         }else{
                         echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>The user does not exist!
  </div></div>";
                         }
                         } else{
                           echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>The password dose not match!
  </div></div>";
                         }
           }else{

            echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>Please input your new password!
  </div></div>";
           }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DMTMusic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="pages/css/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="col-md-4 col-md-offset-4">
<form action="password.php" method="POST">
<p>
<label>New Password:</label>
<input type="password" name="password" class="form-control" placeholder="Password" autofocus required>
</p><p>
<label>New Password Confirm:</label>
<input type="password" name="password_again" class="form-control" placeholder="Password" autofocus required>
</p>
<input type="submit" value="Change Password" class="btn btn-primary btn-md btn-block">
</form>
</body>
</div>
</div>
</html>
<?php

?>
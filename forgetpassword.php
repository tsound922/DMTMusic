<?php
  require 'connect.inc.php';
  @$email=$_POST['email'];
  @$user=$_POST['username'];

if(isset($email)){
  $exist =  mysqli_query($conn, "SELECT * FROM user WHERE email ='$email' AND username='$user'");
if(mysqli_num_rows($exist)!=0){
   $str = "qpwoeirutyamzsxdhcfgvbkjnl0432675819.,'/";
   $str = str_shuffle($str);
   $str = substr($str, 0, 10);
   $url = "http://www-student.it.uts.edu.au/~zhenyuwa/DMT/reset.php?token=$str&email=$email";
   $headers = array('From: DMT Music Support',
		'Content-Type: text/html'
);
    $body="
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
 <div class='container'>
      <div align='left'>Dear $user</div><br/>
      <div>A password reset is confirmed. Please visit <a href='$url'>here</a> to reset your password.</div>
        <br/><br/>
      <div align='right'>Team: DMT Music</div>
  ";
   if(mail($email, "Reset Password Notification", $body, implode("\r\n", $headers))){
   $querry =  mysqli_query($conn, "UPDATE user SET token='$str' WHERE email='$email' AND username='$user'");

   echo "<div class='container' align='center'><div class='alert alert-success'>
                      A mail has been sent to your email address. Please check it.
                      </div></div>";
                      header("refresh:3; url= index.php");
                      }else{
                      echo  "<div class='container' align='center'><div class='alert alert-danger'>
   The mail cannot send at the moment. Please try again litter.
  </div></div>";
                      }
}else{
    echo "<div class='container' align='center'><div class='alert alert-danger'>
    Your email is not valid! Please check your input.
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
<form action="forgetpassword.php" method="POST">
<div class="alert alert-info" align="center">
    <strong>Notice:</strong><br/>A temporary password will send to your registed email address. Please use this password login and reset your password.
</div>
<p>
<div align="center"><label style='color:red'>Password Reset</label></div></p>
<p>
<label>Username: </label>
<input type="text" name="username" class="form-control" placeholder="User Name" autofocus required></p
<p>
<label>Email: </label>
<input type="text" name="email" class="form-control" placeholder="email" autofocus required>
</p>
<p>
<input type="submit" value="Request Password" name="forgetpass" class="btn btn-primary btn-md btn-block">
 </p>
</form>
</body>
</div>
</div>
</html>
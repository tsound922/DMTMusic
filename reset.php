<?php
    require 'connect.inc.php';
    $email = $_GET['email'];
    $token = $_GET['token'];
   if ($token&&$email){
       $exist = mysqli_query($conn, "SELECT id FROM user WHERE email ='$email' AND token='$token'");
       if(mysqli_num_rows($exist)!=0){
            $headers = array('From: DMT Music Support',
		'Content-Type: text/html'
);
           $str = "qazplmoknijhbuytgbvfredcxsw0162384975';.,/\][";
           $str = str_shuffle($str);
           $str = substr($str, 0, 15);
           $password = "$str";
           $query = mysqli_query($conn, "UPDATE user SET password = '$password', token='' WHERE email='$email'");
           echo "<div class='container'><div class='alert alert-success' align='center'>
                Your password is reset as <label style='color:red'>$password</label>. Please login and change your password.
  </div></div>";
             $body = "
           <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
 <div class='container'>
      <div align='left'>Dear User</div><br/>
      <div>Your temporary password is <label style='color:red'>$password</label></div>
        <br/><br/>
      <div align='right'>Team: DMT Music</div>
  ";
   mail($email, "Temporary Password", $body, implode("\r\n", $headers));
       }else{

             echo "<div class='container'>
              <div class='alert alert-warning' align='center'>
              <h2><label align='center'><b>Announcement:</b></label></h2><br/><br/>
    <h3>Please check your email box </h3>
  </div>
             </div>";
       }
   }else{
         header("Location: index.php");
         exit();
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
</body>
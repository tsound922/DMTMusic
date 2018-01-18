<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset(isset($_POST['password'])&&isset($_POST['password_again'])){

           $password = $_POST['password'];
           $password_again = $_POST['password_again'];
            $finalpass=md5

           if(!empty($password)&&!empty($password_again)){
             if($password==$password_again){
               $finalpass=md5($password);
              $exist =  mysqli_query($conn, "SELECT * FROM user WHERE username ='".$_SESSION['user_name']."'");
                     if(mysqli_num_rows($exist)!=0){
                        mysqli_query($conn, "UPDATE user SET password='$finalpass' WHERE username= '".$_SESSION['user_name']."'");
                            "<div class='container' align='center'><div class='alert alert-success'>
                      Your Password Update is <strong>Success!</strong>
                      </div></div>";
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
<form action="register.php" method="POST">
<p>
<label>Username: </label>
<input type="text" name="username" class="form-control" placeholder="User Name" autofocus required maxlength="30" value="<?php echo @$username; ?>">
</p>
<p>
<label>Password:</label>
<input type="password" name="password" class="form-control" placeholder="Password" autofocus required>
</p><p>
<label>Password Confirm:</label>
<input type="password" name="password_again" class="form-control" placeholder="Password" autofocus required>
</p>
<p>
<label>First Name: </label>
<input type="text" name="firstname" class="form-control" placeholder="First Name" autofocus required maxlength="40" value="<?php echo @$firstname; ?>">
</p>
<p>
<label>SurName: </label>
<input type="text" name="surname" class="form-control" placeholder="Sur Name" autofocus required maxlength="40" value="<?php echo @$surname; ?>">
</p>
<p>
<label>E-mail: </label>
<input type="text" name="email" class="form-control" placeholder="Email" autofocus required maxlength="60" value="<?php echo @$email; ?>">
</p>
<input type="submit" value="Register" class="btn btn-primary btn-md btn-block">
</form>
</body>
</div>
</div>
</html>
<?php
}else if(loggedin()){
echo 'Your register is successful! Now you are logged in.';
header('refresh:3; url=loginpages/index.php');
}
?>
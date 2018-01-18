<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin()){
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['email'])){
           $username = $_POST['username'];
           $password = $_POST['password'];
           $password_again = $_POST['password_again'];
           $firstname = $_POST['firstname'];
           $surname = $_POST['surname'];
           $email = $_POST['email'];

           if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname)&&!empty($email)){
               if(strlen($username)>30||strlen($firstname)>40||strlen($surname)>40){
                 echo 'Please ahear to maxlength of fields.';
                 }else{
                 if($password!=$password_again){
               echo "Passwords do not match!";
               } else {
                 $query_check = "select username from user where username='$username'";
                 $query_check_run = mysqli_query($conn, $query_check);
                 if(mysqli_num_rows($query_check_run)==1){
                 echo "The username $username already exist!";
                 }else{
                     $query_register = "insert into user value('','".mysqli_real_escape_string($conn,$username)."','".mysqli_real_escape_string($conn,$password)."','".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$surname)."','".mysqli_real_escape_string($conn,$email)."','NULL')";
                    if( $query_register_run = mysqli_query($conn,$query_register)){
                    header('Location: register_success.php');
                    }else{
                          echo 'Sorry, we couldn\'t register you at this time. Try again latter';
                    }
                 }
                 }
               }
           } else{
           echo "All fields are required!";
           }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
header("refresh:3; url= loginpages/index.php");
}
?>
<?php
if (isset($_POST['username'])&&isset($_POST['password'])){
     $username=$_POST['username'];
     $password=$_POST['password'];

     $password_hash= md5($password);

     if(!empty($username)&&!empty($password)) {
               $query = "select * from user where username='".mysqli_real_escape_string($conn,$username)."' and password ='".mysqli_real_escape_string($conn,$password)."'";
               if($query_run = mysqli_query($conn,$query)){
                     $query_num_rows = mysqli_num_rows($query_run);
                     if($query_num_rows==0){
                                    echo "<div class='container'><div class='col-md-4 col-md-offset-4'><label style='color:red'>Invalid user/pass combination.</label></div></div>";
                     }else if ($query_num_rows==1){

                     $result_array=$query_run->fetch_object();
                     $user_id=$result_array->id;
                     $user_name=$result_array->username;
                     $_SESSION['user_id']=$user_id;
                     $_SESSION['user_name']=$user_name;
                     echo "<div class='container'><div class='col-md-4 col-md-offset-4'><label style='align:center'>You are now logging in..</label></div></div>";
                     header('Location: loginpages/index.php');
                     }
               }



     }else{
        echo 'You must supply a username and password';
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
  <link rel="stylesheet" href="css/stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="col-md-4 col-md-offset-4">
<form action="<?php echo $current_file; ?>" method="POST">
<p>
<label>Username: </label>
<input type="text" name="username" class="form-control" placeholder="User Name" autofocus required></p>
<p>
<label>Password:</label>
<input type="password" name="password" class="form-control" placeholder="Password" autofocus required>
</p>
<p align="right"><a href="forgetpassword.php">Forget your password?</a></p>
<p>
<input type="submit" value="Login" class="btn btn-primary btn-md btn-block" name="Login">
</p>
</form>
</div>
</div>
</body>
</html>
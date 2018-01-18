<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['firstname'])&&isset($_POST['surname'])&&isset($_POST['email'])){
           $firstname = $_POST['firstname'];
           $surname = $_POST['surname'];
           $email = $_POST['email'];
           if(!empty($firstname)&&!empty($surname)&&!empty($email)){ 
             if (filter_var($email, FILTER_VALIDATE_EMAIL)==true) {
               if(strlen($firstname)>40||strlen($surname)>40){
                   echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>Please ahear to maxlength of fields.
  </div></div>";
               }else {
                     $exist =  mysqli_query($conn, "SELECT * FROM user WHERE username ='".$_SESSION['user_name']."'");
                     if(mysqli_num_rows($exist)!=0){
                        mysqli_query($conn, "UPDATE user SET firstname='$firstname',surname='$surname',email='$email' WHERE username= '".$_SESSION['user_name']."'");

                        echo "<div class='container' align='center'><div class='alert alert-success'>
                      Your Update is <strong>Success!</strong>
                      </div></div>";
                        header('refresh:2; url=index.php');
                     }else{
                           echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>The user does not exist!
  </div></div>";
                     }
               }
             }else{
                  echo "<div class='container' align='center'><div class='alert alert-danger'>
    <strong>Update Failed! </strong>Invalid email address.
  </div></div>";

             }
             
               
           } else{
             echo "<div class='alert alert-danger'>
    <strong>Update Failed! </strong>Information is missing.
  </div>";
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
<form action="update_info.php" method="POST">
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
<input type="submit" value="Update" class="btn btn-primary btn-md btn-block">
</form>
</body>
</div>
</div>
</html>
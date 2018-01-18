<?php
require 'core.inc.php';
require 'connect.inc.php';
    if($_SESSION['user_name']==""){
      header('location: ../sampleloop.php');
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

<nav class="navbar navbar-inverse" id="colorstyle">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand"  font-family="impact">DMTmusic</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
      <li ><a href="news.php">News</a></li>
      <li><a href="tips.php">Tips</a></li>
      <li class="active"><a href="sampleloop.php">Sample and Loop</a></li>
      <li ><a href="about.php">About Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a href="#"  data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo ''.$_SESSION['user_name'].''?><span class="caret"></span></a>
             <ul class="dropdown-menu">
      <li><a href="update_info.php"><span class="glyphicon glyphicon-edit" align="left"></span>Information Update</a></li>
      <li><a href="password.php"><span class="glyphicon glyphicon-lock" align="left"></span>Change Password</a></li>
    </ul>
      </li>
      <li><a href="../logout.php" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container" id="colorstyle">
<div class="jumbotron">
     <center ><h2>Please Upload your Sample/Loops</h2><br />
     <form action = "upload.php" method="post" enctype="multipart/form-data">
         <h4> Theme: </h4><p><input type="text" class="form-control" name="theme" style="width:400px;"></p>
         <br />
         <h4>Message: </h4><p>
         <textarea class="form-control" style="resize:none; width: 400px; height: 300px;" name="message"></textarea>
         </p>
        <p><center><input class="btn btn-info btn-lg" type="file" name="file"></center></p>
        <p><input class="btn btn-info" type="submit" name="submit" value="Upload" ></p>
     </form>
      </center>
<?php
if(isset($_FILES['file'])){
   $file = $_FILES['file'];
   //File properties
   $file_name= $file['name'];
   $file_tmp = $file['tmp_name'];
   $file_size = $file['size'];
   $file_error = $file['error'];
   //file extension
   $file_ext= explode('.', $file_name);
   $file_ext = strtolower(end($file_ext));
   $allowed = array('mp3','wav');

     $message = @$_POST['message'];
   $theme = @$_POST['theme'];
   $date= date("Y/m/d");


if(isset($_POST['submit'])){
  if($theme && $message){
             if(strlen($theme) >= 10 && strlen($theme)<=70){
  if(in_array($file_ext, $allowed)){
        if($file_error==0){
             if($file_size<=2097152){
             $file_name_new = uniqid('',true).'.'.$file_ext;
             $file_destination = 'uploads/'.$file_name_new;

             if(move_uploaded_file($file_tmp, $file_destination)){

                  $sql = "INSERT INTO tracks (id,track,message,theme,creator,date) VALUES ('','".$file_name_new."','".$message."','".$theme."','".$_SESSION['user_name']."','".$date."')";

                  mysqli_query($conn, $sql);

                 echo "<div class='alert alert-success'>
                      Your Upload is <strong>Success!</strong>
                      </div>";
             }else{
echo "<div class='container'>
        <div class='alert alert-danger' align='center'>
        The server is not allow to upload files due to the security issues.
        </div></div>";
}
             }
        }else{
              echo "<div class='alert alert-danger'>
    <strong>Failed! </strong>Please follow the rules of Upload.
  </div>";
        }
   }else{
                    echo "<div class='alert alert-danger'>
    <strong>Failed! </strong>Please choose your file.
  </div>";

             }

   
  }else{echo "<div class='container'>
        <div class='alert alert-danger' align='center'>
        Theme must between 10 and 70 characters long!
        </div></div>";}
}else{echo "<div class='container'>
        <div class='alert alert-danger' align='center'>
        Please fill in all the fields
        </div></div>";}
}

}
?>



</div>

</div>
</body>
</html>

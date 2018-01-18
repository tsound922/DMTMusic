<?php
require 'core.inc.php';
require 'connect.inc.php';
  if($_SESSION['user_name']==""){
      header('location: ../index.php');
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
      <li class="active"><a href="tips.php">Tips</a></li>
      <li ><a href="sampleloop.php">Sample and Loop</a></li>
      <li ><a href="about.php">About Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" ><span class="glyphicon glyphicon-user"></span><?php echo ''.$_SESSION['user_name'].''?></a></li>
      <li><a href="../logout.php" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<div class="jumbotron">
     <?php
      if($_GET["id"]){
             $check = mysqli_query($conn,"SELECT * FROM user WHERE id='".$_GET['id']."'");
             $rows = mysqli_num_rows($check);
             if(mysqli_num_rows($check)!=0){
               while($row=mysqli_fetch_assoc($check)){
                        echo "<h3 align='center'>Poster Information</h3><p></p>";
                        echo "<h4 align='center'>User: ".$row['username']."</h4>";
                         echo "<h4 align = 'center'>Contact mail: ".$row['email']."</h4>";

               }
             } 
             }
     ?>
</div>
</div>
</body>
</html>
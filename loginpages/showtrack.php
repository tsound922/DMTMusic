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
<div class="container">
<div class="jumbotron">
     <?php
          if($_GET["id"]){
             $check = mysqli_query($conn,"SELECT * FROM tracks WHERE id='".$_GET['id']."'");

             if(mysqli_num_rows($check)){
                   while($row=mysqli_fetch_assoc($check)){
                         $check_u = mysqli_query($conn, "SELECT * FROM user WHERE username='".$row['creator']."'");
                         while($row_u = mysqli_fetch_assoc($check_u)){
                                      $user_id = $row_u['id'];
                         }
                         echo "<h2 align='center'>".$row['theme']."</h2>";
                         echo "<h4 align = 'center'>By <a href='profile.php?id=$user_id'>".$row['creator']."</a><br />Date: ".$row['date']."</h4>";
                        echo "<br /><div align='center' id='player'>
                                         <audio controls='controls' controlsList='nodownload' style=' width:300px;'>";
	                            echo " <source src='uploads/".$row['track']."'";
                                    echo "type='audio/mpeg'> ";
                                         echo "Your browser does not support the audio element.";
                                      echo" </audio><div id='mask' align='center'></div></div>";

                         echo "<h4><br />".$row['message']."</h4>";
                   }
             }else{
                   echo "Message not found.";
             }

          }else{
              echo "Tracks not found.";
          }
     ?>
</div>
</div>
</body>
</html>


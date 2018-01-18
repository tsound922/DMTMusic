 <?php
require 'core.inc.php';
require 'connect.inc.php';
  if($_SESSION['user_name']==""){
      header('location: ../home.php');
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
      <li class="active"><a href="index.php">Home</a></li>
      <li ><a href="news.php">News</a></li>
      <li ><a href="tips.php">Tips</a></li>
      <li ><a href="sampleloop.php">Sample and Loop</a></li>
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
  <h3>Basic Navbar Example</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

</body>
</html>

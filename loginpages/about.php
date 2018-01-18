  <?php
require 'core.inc.php';
require 'connect.inc.php';
if($_SESSION['user_name']==""){
      header('location: ../about.php');
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
      <a class="navbar-brand" font-family="impact">DMTmusic</a>
    </div>
    <ul class="nav navbar-nav" id="main">
      <li ><a href="index.php">Home</a></li>
      <li ><a href="news.php">News</a></li>
      <li ><a href="tips.php">Tips</a></li>
      <li ><a href="sampleloop.php">Sample and Loop</a></li>
      <li class="active"><a href="about.php">About Us</a></li>
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
<h1 id="about-soundcloud">About DMT Music</h1>
<p>DMT Music is a audio platform which allow  people who love the music production to find, share and enjoy the communication with other music producers. This platform  allow people to upload their track previews, raw demos and sample/loops.  This site is also available for users to exchange and share their experiences with each other.
 </p>  
 <p>Want to have a free account?</p>
 <div class="row">
          <div class="col-sm-2"><a href="../register.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-music"></span>Create Account
        </a></div>
 </div>
 </div>
</body>
</html>

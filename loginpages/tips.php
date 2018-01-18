<?php
require 'core.inc.php';
require 'connect.inc.php';
if($_SESSION['user_name']==""){
      header('location: ../tips.php');
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
     <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"></div>
          <div class="col-sm-4"><a href = "tips_add.php"><button type="button" class="btn btn-info">Post</button></a></div>
      </div>


<?php echo '<table class ="table">'?>
      <thead>
             <tr>
                 <th>Tips</th>
                 <th>Author</th>
                 <th>Date</th>
             </tr>
      </thead>
          <?php
$check = mysqli_query($conn,"SELECT * FROM topics");
if(mysqli_num_rows($check) != 0){
      while($row = mysqli_fetch_assoc($check)){
                 @$id = $row['topic_id'];
                 echo "<tr><td><a href = 'showtopic.php?id=$id'><b>".$row['topic_name']."</b></td>";
                 echo "<td>".$row['topic_creator']."</td>";
                 echo "<td>".$row['date']."</td></tr>";
      }
}else {
      echo "No topic found.";
}
?>
     <?php echo "</table>"?>
</div>

</div>
</body>
</html>

<?php
require 'core.inc.php';
require 'connect.inc.php';

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

<div class="container">
<div class="jumbotron">
 <center>
         <br />
         <form action="tips_add.php" method="POST">
        <h3> Tip Name: </h3><p><input type="text" class="form-control" name="topic_name" style="width:400px;"></p>
         <br />
         <h3>Content: </h3><p>
         <textarea class="form-control" style="resize:none; width: 400px; height: 300px;" name="con"></textarea>
         </p>
         <p><input class="btn btn-info" type="submit" name="submit" value="Post" ></p>
 </center>
</div>
</div>
</body>
</html>
<?php
if($_SESSION['user_name']==""){
      header('location: ../tips.php');
}
$t_name = @$_POST['topic_name'];
$content = @$_POST['con'];
$date= date("Y/m/d");
  if(isset($_POST['submit'])){
      if($t_name && $content){
             if(strlen($t_name) >= 10 && strlen($t_name)<=70){
                 if($query_tips = mysqli_query($conn, "INSERT INTO topics(topic_id,topic_name,topic_content,topic_creator,date) values ('','".$t_name."','".$content."','".$_SESSION['user_name']."','".$date."')")){
                     echo "
                  <div class='container'>
                     <div class='alert alert-success alert-dismissible' align='center'>
                               Your post is <strong>Success!</strong>
                     </div>
                   </div>";
                 }else{
                       echo "Failed!";
                       echo $_SESSION['user_name'];
                 }
             } else{
               echo "<div class='container'>
               <div class='alert alert-danger' align='center'>
               Topic name must between 10 and 70 characters long!
               </div></div>";
             }
      } else{
        echo "<div class='container'>
        <div class='alert alert-danger' align='center'>
        Please fill in all the fields
        </div></div>";
      }
  }

<?php
  require 'core.inc.php';
  session_destroy();
  echo "<div class='container'><div class='col-md-4 col-md-offset-4'><label style='align:center'>You are now logging out..</label></div></div>";
  header('refresh:3; url=index.php');
?>
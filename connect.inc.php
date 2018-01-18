<?php

$mysql_host ='rerun';
$mysql_user = 'zhenyuwarw';
$mysql_pass = 'SGwfpPwD';
$conn_error = 'Could not connect!';
$mysql_db = 'zhenyuwa';
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass);
//@mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die($conn_error);
if (!@$conn||!@mysqli_select_db($conn,$mysql_db)){

      die($conn_error);
     }

?>
<?php

require 'connect.inc.php';
require 'core.inc.php';

if(loggedin()){
    //echo 'You\'re logged in '.$_SESSION['user_name'].'.';
    header("refresh:3; url=loginpages/index.php");
}else{
include 'loginform.inc.php';
}

?>
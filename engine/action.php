<?php 
session_start();


$action=$_GET["action"];
if($action=="logout"){
    session_destroy();
    header("Location: ../public/index.php");
}


?>
<?php
    require_once('mysql.php');
    $_SESSION['uid']='';
    $_SESSION['username']='';
    $_SESSION['nickname']='';
    $_SESSION['email']=''; 
    $_SESSION['major']='';   
    $_SESSION['habit']='';   
    $_SESSION['sex']='';   
    $$_SESSION['introduce'];  
    header('location:login.php');
?>
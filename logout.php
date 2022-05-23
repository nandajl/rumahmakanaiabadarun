<?php
session_start();

$_SESSION['id_user']='';
$_SESSION['id_akses']='';
$_SESSION['username']='';
$_SESSION['email']='';

$_SESSION['id_user']='';
$_SESSION['id_akses']='';
$_SESSION['username']='';
$_SESSION['email']='';

session_unset();
session_destroy();
header('location:index.php');

 ?>

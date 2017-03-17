<?php
session_start();
if(!isset($_SESSION['session_user'])){
  header('Location: ../index.php');
}else{
  $user = $_SESSION['session_user'];
  $email = $_SESSION['session_email'];
  $komunitas = $_SESSION['session_komunitas'];
  $role = $_SESSION['session_role'];
}
?>

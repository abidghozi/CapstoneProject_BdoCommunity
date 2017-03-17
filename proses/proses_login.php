<?php
include('proses_koneksi.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM table_user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
  $row = mysqli_fetch_array($result);
  $_SESSION['session_user']=$row[0];
  $_SESSION['session_email']=$row[2];
  $_SESSION['session_komunitas']=$row[3];
  $_SESSION['session_role']=$row[4];
  echo "<script>alert('Berhasil Login');
  window.location.href='../index.php';
  </script>";
}else{
  echo "<script>alert('Gagal Login');
  window.location.href='../index.php';
  </script>";
}

 ?>

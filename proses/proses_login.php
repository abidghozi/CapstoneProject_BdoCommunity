<?php
include('proses_koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT username FROM table_user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
  echo "<script>alert('Berhasil Login');
  window.location.href='../index.php';
  </script>";
}else{
  echo "<script>alert('Gagal Login');
  window.location.href='../index.php';
  </script>";
}

 ?>

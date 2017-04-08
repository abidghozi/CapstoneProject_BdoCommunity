<?php
session_start();
include('proses_koneksi.php');
if(!isset($_SESSION['session_user'])){
  header('Location: ../index.php');
}else{
  $user = $_SESSION['session_user'];
  $email = $_SESSION['session_email'];
  $komunitas = $_SESSION['session_komunitas'];
  $role = $_SESSION['session_role'];
  if($role != 1){
    $query_namaKomunitas = mysqli_query($conn, "SELECT * FROM data_komunitas WHERE idKomunitas = '$komunitas'");
    $result_namaKomunitas = mysqli_fetch_array($query_namaKomunitas);
    $namaKomunitas = $result_namaKomunitas[1];
  }
}

?>

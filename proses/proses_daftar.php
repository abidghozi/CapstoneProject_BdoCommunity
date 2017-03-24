<?php
  include('proses_koneksi.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $komunitas = $_POST['komunitas'];

  $query = "INSERT INTO table_user VALUES('$username', '$password', '$email', '$komunitas', 3)";
  $result = mysqli_query($conn, $query)or die(mysql_error($conn));

  if($result){
    echo "<script>alert('Berhasil registrasi akun');
    window.location.href='../index.php';
    </script>";

  }else{
    echo "<script>alert('Gagal registrasi akun');
    window.location.href='../index.php';
    </script>";
  }
?>

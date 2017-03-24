<?php
  include('proses_koneksi.php');

  $username = $_POST['username'];
  $email = $_POST['email'];

  $query = "UPDATE table_user SET email = '$email' WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if($result){
    echo "<script>alert('Akun Berhasil Diedit');
    window.location.href='../dashboard/hi_datauserkomunitas.php';
    </script>";

  }else{
    echo "<script>alert('Akun Gagal Diedit');
    window.location.href='../dashboard/hi_datauserkomunitas.php';
    </script>";
  }
?>

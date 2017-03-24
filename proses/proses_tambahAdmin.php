<?php
  include('proses_koneksi.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $komunitas = $_POST['komunitas'];

  echo $email."|".$komunitas;

  //$query = "INSERT INTO table_user VALUES('$username', '$password', '$email', '$newkomunitas', 2)";
  //$result = mysqli_query($conn, $query);

  // if($result){
  //   echo "<script>alert('Berhasil registrasi akun');
  //   window.location.href='../dashboard/hi_dataadminkomunitas.php';
  //   </script>";
  //
  // }else{
  //   echo "<script>alert('Gagal registrasi akun');
  //   window.location.href='../dashboard/hi_dataadminkomunitas.php';
  //   </script>";
  // }
?>

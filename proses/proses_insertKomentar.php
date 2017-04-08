<?php
  include('proses_koneksi.php');

  $idArtikel = $_POST['id'];
  $q = $_POST['id'];
  $user = $_POST['user'];
  $komentar = $_POST['komentar'];

  //GENERATE IDKOMENTAR
  $query_id = "SELECT idKomentar FROM data_komentar ORDER BY idKomentar DESC LIMIT 1";
  $result_id = mysqli_query($conn,$query_id);
  $row_id = mysqli_fetch_array($result_id);
  $id = substr($row_id[0],2);
  $id = $id + 1;
  $id = "km".$id;

  //GENERATE TODAY
  $dtToday = date( "Y-m-d, H:i:s");

  $query = "INSERT INTO data_komentar VALUES('$id', '$idArtikel', '$user', '$komentar', '$dtToday')";
  $result = mysqli_query($conn, $query)or die(mysql_error($conn));

  if($result){
    echo "<script>alert('komentar Ditambahkan');</script>";
    header("Location: ../artikel.php?q=".$q);

  }else{
    echo "<script>alert('Gagal Memberi Komentar')</script>";
    header("Location: ../artikel.php?q=".$q);
  }
?>

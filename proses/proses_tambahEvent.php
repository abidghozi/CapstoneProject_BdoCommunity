<?php
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");

$tema = $_POST['tema'];
$tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$detail = $_POST['editor1'];
$p_jawab = $_POST['p_jawab'];
$k_jawab = $_POST['k_jawab'];
$l_event = $_POST['l_event'];
$creator_event = $komunitas;
$eventCreated = date("Y/m/d/h:i:s");

echo $tema."<br>".$tanggal."<br>".$nama."<br>".$detail."<br>".$p_jawab."<br>".$k_jawab."<br>".$l_event."<br>".$creator_event;

//GENERATE IDEVENT
$query = "SELECT * FROM data_event ORDER BY eventCreated DESC LIMIT 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$id = substr($row[0],2);
$id = $id + 1;
$id = "id".$id;

$query = "INSERT INTO data_event VALUES('$id','$tema','$tanggal','$nama','$detail','$p_jawab','$k_jawab','$l_event','$creator_event','WAITING','$eventCreated')";
$result = mysqli_query($conn, $query)or die(mysql_error($conn));

if($result){
  echo "<script>window.location.href='../dashboard/hi_showevent.php?id_event=".$id."';</script>";

}else{
  echo "<script>alert('Gagal Input Artikel');
  window.location.href='../dashboard/hi_dataevent.php';
  </script>";
}

 ?>

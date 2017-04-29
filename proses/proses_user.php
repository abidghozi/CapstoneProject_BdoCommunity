<?php
include('proses_koneksi.php');

if(isset($_GET['q'])){
  $proses_param = $_GET['q'];
  if($proses_param == "komentar"){
    $query = "DELETE FROM data_komentar WHERE idKomentar='".$_GET['idk']."' AND idArtikel='".$_GET['ida']."'";
    $result = mysqli_query($conn,$query)or die(mysqli_error($conn));
    header("Location: ../dashboard/datakomentar.php");
  }
  if($proses_param == "event"){
    $query = "DELETE FROM data_event_follower WHERE id_follower='".$_GET['fl']."' AND id_event='".$_GET['id']."'";
    $result = mysqli_query($conn,$query)or die(mysqli_error($conn));
    header("Location: ../dashboard/dataevent.php");
  }
}else{
  header("Location: ../index.php");
}

?>

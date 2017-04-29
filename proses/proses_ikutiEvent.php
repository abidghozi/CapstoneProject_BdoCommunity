<?php
include('proses_koneksi.php');

$id_follower = " ";
$id_event = $_POST['id_event'];
$username = $_POST['user'];

//GENERATE IDEVENT
$query_id = "SELECT id_follower FROM data_event_follower ORDER BY dateFollowed DESC LIMIT 1";
$result_id = mysqli_query($conn,$query_id);
$row_id = mysqli_fetch_array($result_id);
$id = substr($row_id[0],2);
$id = $id + 1;
$id = "fl".$id;
$id_follower = $id;


//GENERATE TODAY
$dtToday = date( "Y-m-d, H:i:s");

$query_cek = "SELECT * FROM data_event_follower WHERE id_event = '$id_event' AND username = '$username'";
$result_cek = mysqli_query($conn, $query_cek);
$num_cek = mysqli_num_rows($result_cek);

if($num_cek==0){
  $query = "INSERT INTO data_event_follower VALUES('$id_follower', '$id_event', '$username', '$dtToday')";
  if($result = mysqli_query($conn, $query)){}else{
    echo "<script>alert('Event Sudah Di Ikuti');</script>";
  }
}

if($result){
  echo "<script>alert('Event Di Ikuti');</script>";
  header("Location: ../sh_event.php?q=".$id_event);
}else{
  echo "<script>alert('Gagal Mengikuti Event')</script>";
  header("Location: ../sh_event.php?q=".$id_event);
}
?>

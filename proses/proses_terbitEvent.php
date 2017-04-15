<?php
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");

$id = $_POST['idevent'];
$tema = $_POST['tema'];
$tanggal = $_POST['tanggal'];
$tanggal_old = $_POST['tanggal_old'];
$nama = $_POST['nama'];
$detail = $_POST['editor1'];
$p_jawab = $_POST['p_jawab'];
$k_jawab = $_POST['k_jawab'];
$l_event = $_POST['l_event'];
$creator_event = $komunitas;

if($tanggal === null || $tanggal == '' || $tanggal == ""){
  $tanggal = $tanggal_old;
}

$query = "UPDATE data_event SET tema_event = '$tema',
                                tanggal_event = '$tanggal',
                                nama_event = '$nama',
                                detail_event = '$detail',
                                pj_event = '$p_jawab',
                                kontak_pj_event = '$k_jawab',
                                lokasi_event = '$l_event'
                                WHERE id_event = '$id'";
$result = mysqli_query($conn, $query) or die(mysql_error($conn));

if($_POST['submit'] == "Simpan & Terbitkan Event"){
  $query = "UPDATE data_event SET status = 'PUBLISHED' WHERE id_event = '$id'";
  $result = mysqli_query($conn, $query) or die(mysql_error($conn));
  header('Location: ../dashboard/hi_dataevent.php');
}else if($_POST['submit'] == "Simpan Event"){
  header('Location: ../dashboard/hi_dataevent.php');
}else{
  header('Location: ../index.php');
}
 ?>

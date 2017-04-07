<?php
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");

$id = $_POST['idArtikel'];
$judul = $_POST['judul'];
$dataArtikel = $_POST['editor1'];

//GENERATE INSERTED tag
$idTag = "";
$tag = explode("#",$_POST['tag']);
$trimmed_tag=array_map('trim',$tag);
for($x = 1; $x<(sizeof($tag)); $x++ ){
  if($x!=(sizeof($tag)-1)){$idTag = $idTag.str_replace(' ', '',"# ".$tag[$x]);}else{
    $idTag = $idTag.str_replace(' ', '',"# ".$tag[$x]);;
  }
}
$idTag = strtoupper($idTag);

$query = "UPDATE data_artikel SET jdlArtikel = '$judul', dtArtikel = '$dataArtikel', idTag = '$idTag' WHERE idArtikel = '$id'";
$result = mysqli_query($conn, $query) or die(mysql_error($conn));

if($_POST['submit'] == "Simpan & Terbitkan Artikel"){
  $query = "UPDATE data_artikel SET statusArtikel = 'PUBLISHED' WHERE idArtikel = '$id'";
  $result = mysqli_query($conn, $query) or die(mysql_error($conn));
  header('Location: ../dashboard/hi_dataartikel.php');
}else if($_POST['submit'] == "Simpan Artikel"){
  header('Location: ../dashboard/hi_dataartikel.php');
}else{
  header('Location: ../index.php');
}
 ?>

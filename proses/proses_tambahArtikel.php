<?php
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");

//GENERATE IDARTIKEL
$query = "SELECT * FROM data_artikel ORDER BY idArtikel DESC LIMIT 1";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$id = substr($row[0],2);
$id = $id + 1;
$id = "id".$id;
$idTag = "";

//GENERATE INSERTED tag
$tag = explode("#",$_POST['tag']);
$trimmed_tag=array_map('trim',$tag);
for($x = 1; $x<(sizeof($tag)); $x++ ){
  if($x!=(sizeof($tag)-1)){$idTag = $idTag.str_replace(' ', '',"# ".$tag[$x].",");}else{
    $idTag = $idTag.str_replace(' ', '',"# ".$tag[$x]."<br>");;
  }
}

$idArtikel = $id;
$jdlArtikel = $_POST['judul'];
$dtArtikel = $_POST['editor1'];
$tglArtikel = date("Y/m/d/h:i:s");
$statusArtikel = "WAITING"; //ADA 3 Status WAITING PUBLISHED REVOKED
$creatorArtikel = $komunitas;

echo $id."<br>";
echo $jdlArtikel."<br>";
echo $dtArtikel."<br>";
echo $tglArtikel."<br>";
echo $statusArtikel."<br>";
echo $creatorArtikel."<br>";
echo $idTag."<br>";
?>

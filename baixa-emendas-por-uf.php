<?php 
ob_start();
set_time_limit(0);
$conn = new mysqli("localhost", "root", "", "db_municipios");

$sql = "SELECT * FROM  `municipios` WHERE uf = 'ac'"; 
$qr = mysqli_query($conn, $sql);

while ($reg = mysqli_fetch_assoc($qr)) {
	$url = "http://dab2.saude.gov.br/sistemas/notatecnica/arquivos/OBRAS/OBRAS_".$reg['ibge'].".xls";
	header("Content-Type:   application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=".$url."");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	readfile($url);
}
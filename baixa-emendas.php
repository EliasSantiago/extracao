<?php 
echo "<meta charset='utf-8'>";
set_time_limit(0);
//cria conexão
$conn = new mysqli("localhost", "root", "", "db_municipios");
//verifica conexão
if ($conn->connect_error) {
    die("Falha: " . $conn->connect_error);
} 
$sql = "SELECT * FROM  `municipios` LIMIT 2"; 
$qr = mysqli_query($conn, $sql);


while ($reg = mysqli_fetch_assoc($qr)) {
$url = "http://dab2.saude.gov.br/sistemas/notatecnica/arquivos/OBRAS/OBRAS_".$reg['ibge'].".xls";

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=".$url."");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
readfile($url);

}
?>
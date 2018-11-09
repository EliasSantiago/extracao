<?php 
$conn = new mysqli("localhost", "root", "", "db_dependencia");

$sql = "SELECT * FROM  tb_dependentes"; 

$qr = mysqli_query($conn, $sql);
$qr2 = mysqli_query($conn, $sql);

echo '<table border=1>';
echo '<tr>';
echo '<td>Sequência</td>';
echo '<td>Nome</td>';
echo '<td>Dependente</td>';
echo '<td>#</td>';
echo '</tr>';

while ($dados = mysqli_fetch_assoc($qr2)) {
	$listaSeq = array($dados['sequencia']);
	$listaDep = array($dados['dependente']);
}
$numDigSeq = strlen($maxValorSeq = max($listaSeq));
$numDigDep = strlen($maxValorDep = max($listaDep));

while ($reg = mysqli_fetch_assoc($qr)) {
	echo '<tr>';
	echo '<td>'. $reg['sequencia'] .'</td>';
	echo '<td>'. utf8_encode($reg['nome']) .'</td>';
	echo '<td>'. $reg['dependente'] .'</td>';

	if ($reg['dependente'] == 0 || $reg == null) {
		echo '<td>'. str_pad($reg['sequencia'], $numDigDep, '0', STR_PAD_LEFT). '.' . str_pad($reg['dependente'], $numDigSeq, '0', STR_PAD_LEFT).'</td>';
			echo '</tr>';
	}else{
			echo '<td>'. str_pad($reg['dependente'], $numDigDep, '0', STR_PAD_LEFT). '.' . str_pad($reg['sequencia'], $numDigSeq, '0', STR_PAD_LEFT).'</td>';
			echo '</tr>';
	}

}
echo '</table>';
 ?>
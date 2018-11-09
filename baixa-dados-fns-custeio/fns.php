<?php 
//*****************************************************************
//https://consultafns.saude.gov.br/recursos/consulta-convenio/entidades?ano=2018&municipio=ADAMANTINA&sgUf=SP

echo "<meta charset='utf-8'>";

set_time_limit(0);
//cria conexão
$conn = new mysqli("localhost", "root", "", "db_municipios");

//verifica conexão
if ($conn->connect_error) {
    die("Falha: " . $conn->connect_error);
} 

$sql = "SELECT * FROM  `zero-base` LIMIT 1"; 
		//LIMIT 30";
$qr = mysqli_query($conn, $sql);

$arquivo = 'fns.xls';
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo '<table>
		<tr>
			<td>IBGE</td>
			<td>CNPJ</td>
			<td>ENTIDADE</td>
			<td>UF/MUNICÍPIO</td>
			<td>SISTEMA</td>
			<td>Nº PROCESSO</td>
			<td>Nº CONVÊNIO</td>
			<td>ANO CONVÊNIO</td>
			<td>VALOR CONCEDENTE</td>
			<td>VALOR PAGO</td>
			<td>VALOR A PAGAR</td>
		</tr>';
while ($dados = mysqli_fetch_assoc($qr)) {
	//echo '<pre><br>';//$ibge.
	$ibge = $dados['ibge'];
	$nome_uf = $dados['municipio'];
	$nome_municipio = substr($nome_uf, 0, strlen($nome_uf)-3);
	$uf = $dados['uf'];

	//temporário
	$pala = "São Paulo";

	$nome_municipio = strtoupper(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($pala))));

	$uf = "SP";

	
	$json_file = file_get_contents("https://consultafns.saude.gov.br/recursos/consulta-convenio/entidades?ano=2018&municipio=".urlencode($nome_municipio)."&sgUf=".urlencode($uf));   
	$json_str = json_decode($json_file, true);
	$result = $json_str['resultado'];
	$res = $json_str['listaGrupo'];
	//$metadata = $json_str['metadata'];
	//print_r($result);
	//echo 'IBGE: '.$ibge.'<br>';
	print_r($res);

	foreach ( $result as $r) 
    { 	
    	echo '<tr>';
    	echo '<td>'.$ibge.'</td>';
    	echo '<td>'.$r['codigo'].'</td>';
    	echo '<td>'.$r['descricao'].'</td>';
    	echo '<td>'.$r['detalhe'].'</td>';

    	foreach ($res as $campo) {
	    	echo '<td>'.$campo['sistema'].'</td>';
	    	
	    	/*
	    	echo '<td>'.$x->sistema.'</td>';
	    	echo '<td>'.$x['numeroProcesso'].'</td>';
	    	echo '<td>'.$x['numeroConvenio'].'</td>';
	    	echo '<td>'.$x['anoConvenio'].'</td>';
	    	echo '<td>'.$x['valorTotalPagoBigDecimal'].'</td>';
	    	echo '<td>'.$x['valorTotalPago'].'</td>';
	    	echo '<td>'.$x['valorAPagar'].'</td>';
	    	*/
    	}
    	
    	echo '</tr>';
    	//echo 'Ano: '.$r[0].' - Valor: '.$r[1]."<br>"; 
    	//$sql_insert = "INSERT INTO nome_tabele (ibge, ano, valor) VALUES ('{$ibge}', '{$r[0]}','{$r[1]}');";

    	//echo $sql_insert.'<br>';
    } 

}
	echo '</table>';

?>
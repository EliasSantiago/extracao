<?php 
//*****************************************************************
//Primeiro: acessar este link e pegar o ibge e/ou nome do Município
//https://consultafns.saude.gov.br/recursos/consulta-detalhada/entidades?ano=2018&count=10&estado=DF&municipio=530010&page=1&tipoConsulta=2

//Segundo: acessar este link e pegar os valores
//https://consultafns.saude.gov.br/recursos/consulta-detalhada/detalhe-saldo?agencia=042005&anoPagamento=2018&banco=001&conta=0000068772&count=50&page=1


//https://consultafns.saude.gov.br/recursos/consulta-detalhada/detalhe-saldo?agencia=041580&anoPagamento=2018&banco=001&conta=0000139351&count=25&page=1

echo "<meta charset='utf-8'>";

set_time_limit(0);
//cria conexão
$conn = new mysqli("localhost", "root", "", "db_contas_fns");

//verifica conexão
if ($conn->connect_error) {
    die("Falha: " . $conn->connect_error);
} 

$sql = "SELECT * FROM  `custeio`"; 

$qr = mysqli_query($conn, $sql);

$arquivo = 'fns-custeio.xls';
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo '<table border=1>
		<tr>
			<td>IBGE</td>
			<td>MUNICÍPIO</td>
			<td>UF</td>
			<td>ANO</td>
			<td>BANCO</td>
			<td>AGENCIA</td>
			<td>CONTA</td>
			<td>DATA-SALDO-FORMATADA</td>
			<td>VALOR-TOTAL-FORMATO</td>
			<td>TIPO</td>
		</tr>';
while ($reg = mysqli_fetch_assoc($qr)) {
	//echo '<pre><br>';//$ibge.
	$ibge = $reg['ibge'];
	$nome_municipio = $reg['municipio'];
	$uf = $reg['uf'];
	$agencia = $reg['agencia'];
	$banco = $reg['banco'];
	$contaBanco = $reg['conta_corrente'];
	//temporário

	$json_file = file_get_contents("https://consultafns.saude.gov.br/recursos/consulta-detalhada/detalhe-saldo?agencia=".urlencode($agencia)."&anoPagamento=2018&banco=".urlencode($banco)."&conta=".urlencode($contaBanco)."&count=25&page=1");

	$json_str = json_decode($json_file, true);
	$result = $json_str['resultado'];
	//$metadata = $json_str['metadata'];
	//print_r($result);
	//echo 'IBGE: '.$ibge.'<br>';

	foreach ($result as $y => $r[0]) 
    {  	
    	if ($y == 'dados') {
    		
	    	foreach ((array) $r[0] as $i => $x) 
	    	{
					echo '<tr>';
	    			echo '<td>'.$ibge.'</td>';
			    	echo '<td>'.$nome_municipio.'</td>';
			    	echo '<td>'.$uf.'</td>';
			    	echo '<td>2018</td>';
			    	echo '<td>'.$banco.'</td>';
			    	echo '<td>'.$agencia.'</td>';
			    	echo '<td>'.$contaBanco.'</td>';

					//echo '<td colspan="4"></td>';

			    	echo '<td>'.$x['dataSaldoFormatada'].'</td>';
			    	echo '<td>'.$x['valorTotalFormatado'].'</td>';
			    	echo '<td>Custeio</td>';
					
					echo '</tr>';
					
				
		    }
		}
    } 

}
	echo '</table>';

?>
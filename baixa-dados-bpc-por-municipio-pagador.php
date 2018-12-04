<?php 
echo "<meta charset='utf-8'>";

set_time_limit(0);

$arquivo = '2017.xls';
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");


echo '<table border=1>
		<tr>
			<td>ibge</td>
			<td>anomes</td>
			<td>bpc_ben</td>
			<td>bpc_pcd_ben</td>
			<td>bpc_idoso_ben</td>
			<td>bpc_pcd_val</td>
			<td>bpc_idoso_val</td>
			<td>bpc_val</td>
		</tr>';

$json_file = file_get_contents("http://aplicacoes.mds.gov.br/sagi/servicos/misocial?q=*&fq=anomes_s:2017*&fq=tipo_s:mes_mu&wt=json&omitHeader=true&fl=ibge:codigo_ibge,anomes:anomes_s,bpc_ben:bpc_ben_i,bpc_pcd_ben:bpc_pcd_ben_i,bpc_idoso_ben:bpc_idoso_ben_i,bpc_pcd_val:bpc_pcd_val_f,bpc_idoso_val:bpc_idoso_val_f,bpc_val:bpc_val_f&rows=100000000&sort=anomes_s%20asc,%20codigo_ibge%20asc");

$json_str = json_decode($json_file, true);
$result = $json_str;

foreach ($result as $key) {
	foreach ($key as $item) {
		foreach ($item as $b) {
			echo '<tr>';
				echo '<td>';
				echo $b['ibge'];
				echo '</td>';
				echo '<td>';
				echo $b['anomes'];
				echo '</td>';				
				echo '<td>';
				echo $b['bpc_ben'];
				echo '</td>';
				echo '<td>';
				echo $b['bpc_pcd_ben'];
				echo '</td>';
				echo '<td>';
				echo $b['bpc_idoso_ben'];
				echo '</td>';
				echo '<td>';
				echo $b['bpc_pcd_val'];
				echo '</td>';
				echo '<td>';
				echo $b['bpc_idoso_val'];
				echo '</td>';
				echo '<td>';
				echo $b['bpc_val'];
				echo '</td>';				
			echo '</tr>';

			// echo '<pre>';
			// print_r($b['ibge']);
			// exit();
		}
	}

}




?>
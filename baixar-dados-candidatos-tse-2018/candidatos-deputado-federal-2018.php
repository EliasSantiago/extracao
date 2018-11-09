<?php 
//Baixa a lista de candidatos a deputado federal
//http://divulgacandcontas.tse.jus.br/divulga/rest/v1/candidatura/listar/2018/AC/2022802018/4/candidatos
set_time_limit(0);
$estados = array( "AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RO", "RS", "RR", "SC", "SE", "SP", "TO" );

// $arquivo = 'lista-candidatos-deputado-federal-2018.xls';
// header ('Cache-Control: no-cache, must-revalidate');
// header ('Pragma: no-cache');
// header('Content-Type: application/x-msexcel');
// header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo '<table border=1>';
echo '<tr>';
echo '<td>UF</td>';
echo '<td>Nome Completo</td>';
echo '<td>Nome Urna</td>';
echo '<td>Cargo</td>';
echo '<td>Número</td>';
echo '<td>Partido</td>';
echo '<td>Coligação</td>';
echo '<td>Situação</td>';
echo '<td>Situação Pós-Pleito</td>';
echo '</tr>';

	foreach ($estados as $uf) {
	$url = 'http://divulgacandcontas.tse.jus.br/divulga/rest/v1/candidatura/listar/2018/' . $uf . '/2022802018/6/candidatos';

	$json_file = file_get_contents($url);

	$json_str = json_decode($json_file, true);

	$result = $json_str['candidatos'];

	foreach ($result as $key) {
		echo '<tr>';

		echo '<td>' . $uf . '</td>';
		echo '<td>' . $key['nomeCompleto'] . '</td>';
		echo '<td>' . $key['nomeUrna'] . '</td>';
		echo '<td>' . $key['cargo']['nome'] . '</td>';
		echo '<td>' . $key['numero'] . '</td>';
		echo '<td>' . $key['partido']['sigla'] . '</td>';
		echo '<td>' . $key['nomeColigacao'] . '</td>';
		echo '<td>' . $key['descricaoSituacao'] . '</td>';
		echo '<td>' . $key['descricaoTotalizacao'] . '</td>';
		echo '</tr>';
	}
}
	return null;


echo '</body>';
?>
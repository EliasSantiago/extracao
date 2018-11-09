<?php 

$arquivo_xml = simplexml_load_file('RelatorioSaldoParcelasPagas.xml');

$n = 0;
echo '<table border="1">';
foreach ($arquivo_xml as $key => $value) {
	echo ($key == 'row' ? '<tr>' : '');
	foreach ($value as $k => $v) {
		if(count($value) == 1) {
			echo '<td colspan="5">'.$v.'</td>';
		} else {
			echo '<td>'.$v.'</td>';
		}	
	}
	echo ($key == 'row' ? '</tr>' : ''); 
	$n++;
}
echo '</table>';
/*echo '<pre>';
print_r($arquivo_xml);*/

?>
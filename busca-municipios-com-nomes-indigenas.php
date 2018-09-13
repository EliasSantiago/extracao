<?php 

echo '<meta charset="utf-8">';
set_time_limit(0);
require('simple_html_dom/simple_html_dom.php');

$url = 'https://www.dicionariotupiguarani.com.br/section/toponimos/cidades/page/';

$arquivo = 'nomes-municipios-indigenas.xls';

header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo '<table border="1">
	<tr>
		<td>Nomes</td>
	</tr>
';

for ($i=1; $i <= 15; $i++) { 
	$website = $url . $i;
	$html = file_get_html($website);

	$divData = $html->find('h2[class=entry-title]');
	foreach ($divData as $key => $value) {  
		$listas = $value->find('a');
			echo '<tr>';
			foreach ($listas as $link) {
				$linkText = $link->plaintext;
				echo '<td>'. $linkText . '</td>';
			}    
			echo '</tr>';
	}
}

echo '</table>';

 ?>
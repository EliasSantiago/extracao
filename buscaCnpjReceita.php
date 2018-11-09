<?php 
//https://www.receitaws.com.br/v1/cnpj/23788493000171


echo "<meta charset='utf-8'>";

set_time_limit(0);

//verifica conexão
if ($conn->connect_error) {
    die("Falha: " . $conn->connect_error);
} 

$sql = "SELECT * FROM  `cnpj`"; 

$qr = mysqli_query($conn, $sql);

$arquivo = 'cnpj.xls';
header ('Cache-Control: no-cache, must-revalidate');
header ('Pragma: no-cache');
header('Content-Type: application/x-msexcel');
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");

echo '<table border=1>
		<tr>
			<td>CNPJ</td>
		</tr>';
while ($reg = mysqli_fetch_assoc($qr)) {
	$cnpj = $reg['cnpj'];

	$json_file = file_get_contents("https://www.receitaws.com.br/v1/cnpj/"."$cnpj");

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
	    			echo '<td>'.$cnpj.'</td>';					
					echo '</tr>';
		    }
		}
    } 

}
	echo '</table>';

?>
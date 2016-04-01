<?php
 
require_once ('lib/nusoap.php');

$wsdl="http://localhost/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');


if (!empty($_POST['num1']) && !empty($_POST['num2'])) {
	$num1 = $_POST['num1'];
	$num2 = $_POST['num2'];
	$option = $_POST['desplegable'];
	$params = array('a' => $num1, 'b'=>$num2);

	switch ($option) {
		case 'add':
			$result= $client->call('Add', $params);
			break;
		
		case 'substract':
			$result= $client->call('Substract', $params);
			break;

		case 'multiply':
		$result= $client->call('Multiply', $params);
		break;

		case 'divide':
		$result= $client->call('Divide', $params);
		break;
	}
	echo '<h2>Resultat</h2><pre>';
}


$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);
}

?>
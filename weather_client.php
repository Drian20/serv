<?php
 
require_once ('lib/nusoap.php');

$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
$client = new nusoap_client($wsdl,'wsdl');

if (!empty($_POST['country'])) {
	$country = $_POST['country'];
	$params = array('CountryName' => $country);
	$result = $client->call('GetCitiesByCountry', $params);
	$result2 = implode('', $result);
	$xml = simplexml_load_string($result2);
}

$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	echo "<table border='1'>";
	for ($i=0; $i < sizeof($xml); $i++) { 
		echo "<tr><td>".$xml->Table[$i]->City."</td></tr>";
	}
	echo "</table>";
}

?>
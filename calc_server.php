<?php

	require_once ('lib/nusoap.php');

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/serv');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/serv';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Substract', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Multiply', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Divide', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

	function Add($a, $b){
		return $a + $b;
	}

	function Substract($a, $b){
		return $a - $b;
	}

	function Multiply($a, $b){
		return $a*$b;
	}

	function Divide($a, $b){
		return $a/$b;
	}
?>


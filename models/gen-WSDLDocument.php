<?php
	//error_reporting(0);
	require 'csapatok.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Csapatok', "http://localhost/feladat/models/soapserver.php", "http://localhost/feladat/models/csapatok.wsdl");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("csapatok.wsdl" , $wsdlfile);
?>

<?php

require("csapatok.php");
$server = new SoapServer("csapatok.wsdl");
$server->setClass('Csapatok');
$server->handle();



?>

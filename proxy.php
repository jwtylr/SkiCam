<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/xml');

$url = 'https://nec-por.ne-compass.com/NEC.XmlDataPortal/api/c2c?networks=Vermont&dataTypes=cctvSnapshotData';
$xml = file_get_contents($url);
echo $xml;
?>
<?php
require_once '../Vendors/autoload.php';

$apiKey = 'secret';
$report = new VirusTotal\Report($apiKey);

var_dump($report->getReport('http://www.google.com'));

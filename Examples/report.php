<?php
require_once '../Vendors/autoload.php';

$apiKey = 'screct';
$report = new VirusTotal\Report($apiKey);

var_dump($report->getReport('http://guzzlephp.org/'));

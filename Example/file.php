<?php
require_once '../Vendors/autoload.php';

$apiKey = 'screct';
$file = new VirusTotal\File($apiKey);

$resourceObj = $file->scan('foo.txt');
var_dump($resourceObj);

// Perform a re-scan
var_dump($file->rescan($resourceObj['resource']));

var_dump($file->getReport($resourceObj['resource']));

<?php
require_once 'vendor/autoload.php';

$apiKey = 'replace_with_your_key';

$file = new VirusTotal\File($apiKey);
$resp = $file->scan('foo.txt');

var_dump($resp);
?>

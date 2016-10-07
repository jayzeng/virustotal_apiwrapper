<?php
require_once '../Vendors/autoload.php';

$urls = array('www.google.com', 'www.yahoo.com', 'infysec.com');
$apiKey = 'screct';

$urlInst = new \VirusTotal\Url($apiKey);

$scanResult = array();

echo '<table>';
foreach ( $urls as $url ) {
    $report = $urlInst->getReport($url);

    printf('<h1>Url: %s</h1>', $url);

    // Obviously, VirusTotal API implements rate limit that you can't hit it too hard. You should consider implement long pulling in Javascript
    if(false === isset($report['scans'])) {
        printf('Url %s is not ready. Verbose message:%s', $url, $report['verbose_msg']);
        continue;
    }

    foreach($report['scans'] as $name => $info) {
        print('<tr>');
        printf('<th>%s</th>', $name);
        printf('<td>%s</td>', $info['detected']);
        printf('<td>%s</td>', $info['result']);
        print('</tr>');
    }
}
echo '</table>';
?>

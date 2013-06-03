<?php
/**
 * Domain object test code
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

use \VirusTotal\Domain;

class DomainTest extends \PHPUnit_Framework_TestCase
{
    public function testGetReport() {
        $domain = new Domain(apikey);
        $response = $domain->getReport('027.ru');
        $sampleDownload = $response['detected_downloaded_samples'][0];

        $this->assertArrayHasKey('date', $sampleDownload);
        $this->assertArrayHasKey('positives', $sampleDownload);
        $this->assertArrayHasKey('total', $sampleDownload);
        $this->assertArrayHasKey('sha256', $sampleDownload);
    }
}
?>

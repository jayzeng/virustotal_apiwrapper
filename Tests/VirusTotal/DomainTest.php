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
        // Mock real response
        $mockResponse = array(
            'detected_downloaded_samples' => array(
                array(
                    'date'      => '2013-06-20 18:51:30',
                    'positives' => 2,
                    'total'     => 46,
                    'sha256'    => 'cd8553d9b24574467f381d13c7e0e1eb1e58d677b9484bd05b9c690377813e54'
                )
            )
        );

        $domainStub = $this->getMock('\VirusTotal\Domain',
                               array('getReport'),
                               array(apiKey));
        $domainStub->expects($this->any())
             ->method('getReport')
             ->will($this->returnValue($mockResponse));

        $response = $domainStub->getReport('027.ru');
        $sampleDownload = $response['detected_downloaded_samples'][0];

        $this->assertArrayHasKey('date', $sampleDownload);
        $this->assertArrayHasKey('positives', $sampleDownload);
        $this->assertArrayHasKey('total', $sampleDownload);
        $this->assertArrayHasKey('sha256', $sampleDownload);
    }
}
?>

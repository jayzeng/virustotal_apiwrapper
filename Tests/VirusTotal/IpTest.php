<?php
/**
 * File object test code
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

use \VirusTotal\Ip;

class IpTest extends \PHPUnit_Framework_TestCase
{
    public function testGetReport() {
        $mockResponse = array(
            'response_code' => 1,
            'resolutions' => array(
                array(
                    'last_resolved' => null,
                    'hostname' => '027.ru'
                )
            ),
            'verbose_msg' => 'IP address found in dataset'
        );
        $ipStub = $this->getMock('\VirusTotal\Ip',
                               array('getReport'),
                               array(apiKey));
        $ipStub->expects($this->any())
             ->method('getReport')
             ->will($this->returnValue($mockResponse));

        // ip copied from https://www.virustotal.com/en/documentation/public-api/#getting-ip-reports
        $response = $ipStub->getReport('90.156.201.27');

        $this->assertSame('027.ru', $response['resolutions'][0]['hostname']);
        $this->assertSame($response['verbose_msg'], 'IP address found in dataset');
    }
}

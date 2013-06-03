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
        $ip = new Ip(apikey);

        // ip copied from https://www.virustotal.com/en/documentation/public-api/#getting-ip-reports
        $response = $ip->getReport('90.156.201.27');

        $this->assertArrayHasKey('resolutions', $response);
        $this->assertSame($response['verbose_msg'], 'IP address found in dataset');
    }
}

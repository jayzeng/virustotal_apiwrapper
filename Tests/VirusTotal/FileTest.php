<?php
/**
 * File object test code
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

use \VirusTotal\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    private $_file;

    private $_fileStub;

    public function setUp() {
        $this->_file = new File(apiKey);

        $this->_fileStub = $this->getMock('\VirusTotal\Domain',
                                          array('scan', 'rescan', 'getReport'),
                                          array(apiKey));
    }

    public function tearDown() {
        unset($this->_file, $this->_fileStub);
    }

    public function testScanAndGetReport() {
        $mockScanResponse = array(
            'scan_id'       => '82f9e84364a90e197f64a039ebb18afb4c847715e1db2d82826ff9cef5f4b2ee-1395282444',
            'sha1'          => 'e07ca263dafaf3968b2a3587b469d2fcdabfa071',
            'resource'      => '82f9e84364a90e197f64a039ebb18afb4c847715e1db2d82826ff9cef5f4b2ee',
            'response_code' => 1,
            'sha256'        => 'cd8553d9b24574467f381d13c7e0e1eb1e58d677b9484bd05b9c690377813e54',
            'permalink'     => 'https://www.virustotal.com/file/82f9e84364a90e197f64a039ebb18afb4c847715e1db2d82826ff9cef5f4b2ee/analysis/1395282444/',
            'md5'           => 'bbe4f28b27120e0a9611d90d242bc656',
            'verbose_msg'   => 'Scan request successfully queued, come back later for the report'
        );

        $this->_fileStub->expects($this->any())
                        ->method('scan')
                        ->will($this->returnValue($mockScanResponse));

        $response = $this->_fileStub->scan( __DIR__ . '/_files/good.txt');

        $this->assertArrayHasKey('scan_id', $response);
        $this->assertArrayHasKey('sha1', $response);
        $this->assertArrayHasKey('resource', $response);
        $this->assertArrayHasKey('response_code', $response);
        $this->assertArrayHasKey('permalink', $response);
        $this->assertArrayHasKey('md5', $response);
        $this->assertArrayHasKey('verbose_msg', $response);

        $mockGetReportResponse = array(
            'scan_id' => '82f9e84364a90e197f64a039ebb18afb4c847715e1db2d82826ff9cef5f4b2ee-1393430686'
        );

        $this->_fileStub->expects($this->any())
                 ->method('getReport')
                 ->will($this->returnValue($mockGetReportResponse));

        // Get report for uploaded file
        $report = $this->_fileStub->getReport($response['resource']);
        $this->assertArrayHasKey('scan_id', $report);
    }

    public function testRescan() {
        $mockRescanResponse = array(
            'response_code' => -1,
            'resource' => '_files/good.txt'
        );

        $this->_fileStub->expects($this->any())
                 ->method('rescan')
                 ->will($this->returnValue($mockRescanResponse));

        $response = $this->_fileStub->rescan( __DIR__ . '/_files/good.txt');
        $this->assertNotEmpty($response);
    }
}
?>

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

    public function setUp() {
        $this->_file = new File(apikey);
    }

    public function tearDown() {
        unset($this->_file);
    }

    public function testScanAndGetReport() {
        $response = $this->_file->scan( __DIR__ . '/_files/good.txt');

        $this->assertArrayHasKey('scan_id', $response);
        $this->assertArrayHasKey('sha1', $response);
        $this->assertArrayHasKey('resource', $response);
        $this->assertArrayHasKey('response_code', $response);
        $this->assertArrayHasKey('permalink', $response);
        $this->assertArrayHasKey('md5', $response);
        $this->assertArrayHasKey('verbose_msg', $response);

        // Get report for uploaded file
        // @TODO more granular testing is needed
        $report = $this->_file->getReport($response['resource']);
        $this->assertArrayHasKey('scans', $report);
    }

    public function testRescan() {
        // @TODO rescan is sorta shaky as it constantly returns 500,
        // may want to do a local mock
        $response = $this->_file->rescan( __DIR__ . '/_files/good.txt');
        $this->assertNotEmpty($response);
    }
}
?>

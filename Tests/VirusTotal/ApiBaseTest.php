<?php
/**
 * ApiBase test
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

use \Guzzle\Http\Client as GuzzleClient;

class ApiBaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * See if a native GuzzleClient instance
     * returns an instance of \VirusTotal\ApiBase
     */
    public function testCtor() {
        $apiBaseStub = new \VirusTotal\ApiBase(apiKey, new GuzzleClient());
        $this->assertInstanceOf('\VirusTotal\ApiBase', $apiBaseStub);
    }

}

<?php
/**
 * Rate limit and invalid key test
 * @category testing
 * @package Test_VirusTotal
 * @author Jay Zeng (jayzeng@jay-zeng.com)
 */
namespace Tests\VirusTotal;

/**
 * Exercise validateResponse() logic
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{
    private $_apiBaseStub;

    private $_validateMethod;

    public function setUp() {
        // Reflect ApiBase and turn validateResponse into a public function
        $apiBaseClass = new \ReflectionClass('\VirusTotal\ApiBase');
        $this->_validateMethod = $apiBaseClass->getMethod('validateResponse');
        $this->_validateMethod->setAccessible(true);

        $this->_apiBaseStub = new \VirusTotal\ApiBase(apiKey);
    }

    public function tearDown() {
        unset($this->_apiBaseStub);
    }

    public function testGoodResponse() {
        $this->assertEmpty($this->_validateMethod->invoke($this->_apiBaseStub, 200));
        $this->assertEmpty($this->_validateMethod->invoke($this->_apiBaseStub, 100));
    }

    /**
     * @expectedException \VirusTotal\Exceptions\RateLimitException
     * @expectedExceptionMessage Too many requests
     */
    public function testRatelimit() {
        $this->_validateMethod->invoke($this->_apiBaseStub, 204);
    }

    /**
     * @expectedException \VirusTotal\Exceptions\InvalidApiKeyException
     * @expectedExceptionMessage Key fakeKey is invalid
     */
    public function testBadKey() {
        $this->_validateMethod->invoke($this->_apiBaseStub, 403);
    }
}

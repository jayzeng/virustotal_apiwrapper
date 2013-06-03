<?php
namespace VirusTotal;

class ApiBase
{
    /**
     * @var Virus Total API endpoint prefix
     */
    const API_ENDPOINT = 'http://www.virustotal.com/vtapi/v2/';

    /**
     * @var ClientInterface - http client
     */
    protected $_client;

    /**
     * @var string - virus total api key
     */
    protected $_apiKey;

    /**
     * Constructor
     * @param string          $apiKey
     * @param ClientInterface $client
     */
    public function __construct($apiKey, ClientInterface $client = null) {
        $this->_apiKey =  $apiKey;

        if ( empty( $client) ) {
            $this->_client = new \Guzzle\Http\Client(self::API_ENDPOINT);
        }
    }

    protected function makeRequest(array $params) {
        $request = $this->_client->post('url/report', null, $params);
        return $request->send();
    }
}

?>

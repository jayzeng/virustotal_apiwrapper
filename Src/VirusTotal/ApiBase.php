<?php
namespace VirusTotal;

class ApiBase
{
    /**
     * @var Virus Total API endpoint prefix
     */
    const API_ENDPOINT = 'https://www.virustotal.com/vtapi/v2/';

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

    /**
     * Util function to make post request
     * @param string          $endpoint
     * @param array           $params
     * @return (?)
     */
    protected function makePostRequest($endpoint, array $params) {
        $request = $this->_client->post($endpoint, null, $params);
        return $request->send();
    }


    /**
     * Util function to make get request
     * @param string          $endpoint
     * @param array           $params
     * @return (?)
     */
    protected function makeGetRequest($endpoint, array $params) {
        // Constructs get url
        // e.g:
        // endpoint = 'ip-address/report'
        //
        // params => array(
        //                'ip'       => '192.168.2.1',
        //                'apikey'   => 'supersecureapikey'
        //            )
        //
        // It will translates to:
        // https://www.virustotal.com/vtapi/v2/ip-address/report?ip=192.168.2.1&apikey=supersecureapikey
        $url = self::API_ENDPOINT . $endpoint . '?'. http_build_query($params);
        $request = $this->_client->get($url);
        return $request->send();
    }
}

?>

<?php
namespace VirusTotal;

class Url extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#getting-url-scans
     * @param string $url    The URL that should be scanned.
     */
    public function scan($url) {
        $data = $this->makePostRequest('url/scan', array(
                        'url'    => $url,
                        'apikey' => $this->_apiKey,
                    ));
        return $data;
    }

    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#getting-url-scans
     * @param string $resource a URL will retrieve the most recent report on the given URL
     */
    public function getReport($resource) {
        $data = $this->makePostRequest('url/report', array(
                    'resource' => $resource,
                    'apikey'   => $this->_apiKey,
                    ));
        return $data;
    }
}

?>

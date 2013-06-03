<?php
namespace VirusTotal;

class Report extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#getting-url-scans
     * @param string $resource a URL will retrieve the most recent report on the given URL
     */
    public function getReport($resource) {
        $data = $this->makeRequest( array(
                        'resource' => $resource,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data->json();
    }
}

?>

<?php
namespace VirusTotal;

class Domain extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#scanning-files
     * @param string $ip       a valid IPv4 address in dotted quad notation
     */
    public function getReport($ip) {
        $data = $this->makePostRequest('domain/report', array(
                        'domain'   => $ip,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data->json();
    }

}

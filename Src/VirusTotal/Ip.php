<?php
namespace VirusTotal;

class Ip extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#scanning-files
     * @param string $ip       a valid IPv4 address in dotted quad notation
     */
    public function getReport($ip) {
        $data = $this->makeGetRequest('ip-address/report', array(
                        'ip'       => $ip,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data;
    }

}

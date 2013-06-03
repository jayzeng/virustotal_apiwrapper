<?php
namespace VirusTotal;

class Domain extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#getting-domain-reports
     * @param string $domain       a domain name
     */
    public function getReport($domain) {
        $data = $this->makeGetRequest('domain/report', array(
                        'domain'   => $domain,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data->json();
    }

}

<?php
namespace VirusTotal;

class File extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#scanning-files
     * @param string $file   absolute file path
     */
     public function scan($file) {
         $data = $this->makePostRequest('file/scan', [
             [
                 'name' => 'file',
                 'contents' => fopen($file, 'r'),
                 'filename' => basename($file)
             ],
             [
                 'name' => 'apikey',
                 'contents' => $this->_apiKey
             ]
         ], 'multipart');

         return $data;
     }

    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#rescanning-files
     * @param string $resource resource id that you retrieve from scan()
     */
    public function rescan($resource) {
        $data = $this->makePostRequest('file/rescan', array(
                        'resource' => $resource,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data;
    }

    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#rescanning-files
     * @param string $resource resource id that you retrieve from scan()/rescan()
     */
    public function getReport($resource) {
        $data = $this->makePostRequest('file/report', array(
                    'resource' => $resource,
                    'apikey'   => $this->_apiKey,
                    ));
        return $data;
    }
}

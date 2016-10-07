<?php
namespace VirusTotal;

class Comment extends ApiBase
{
    /**
     * @see https://www.virustotal.com/en/documentation/public-api/#making-comments
     * @param string $resource   resource id
     * @param string $comment    the actual review, you can tag it using the "#" twitter-like syntax (e.g. #disinfection #zbot) and reference users using the "@" syntax (e.g. @VirusTotalTeam).
     */
    public function addComment($resource, $comment) {
        $data = $this->makePostRequest('comments/put', array(
                        'resource' => $resource,
                        'comment'  => $comment,
                        'apikey'   => $this->_apiKey,
                    ));
        return $data;
    }

}

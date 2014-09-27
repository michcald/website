<?php

namespace Michcald\Website;

class RestClient extends \Michcald\RestClient\Client
{
    private $baseUrl;

    private $identityMap = array();

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function call($method, $resource, $params = array())
    {
        $key = sha1($resource . serialize($params));

        if (array_key_exists($key, $this->identityMap)) {
            switch ($method) {
                case 'delete': // invalidate the cache
                case 'update':
                case 'post':
                    unset($this->identityMap[$key]);
                    break;
                case 'get':
                    return $this->identityMap[$key];
            }
        }

        $url = sprintf('%s%s', $this->baseUrl, $resource);

        // only PHP > 5.3.3
        $params = json_encode($params/*, JSON_NUMERIC_CHECK*/);
        $params = json_decode($params, true);

        $response = parent::call($method, $url, $params);

        if ($response->getStatusCode() == 403) { // forbidden
            throw new \Exception('Cannot connect to API');
        }

        if ($method == 'get') {
            $this->identityMap[$key] = $response;
        }

        return $response;
    }
}

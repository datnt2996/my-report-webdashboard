<?php
namespace App\Helpers;
use GuzzleHttp\Client;

class ApiHelpers {
    public static function request($serviceBaseUri='http://tstudents.herokuapp.com', $method, $uri, array $options = null, $jwtToken = null, $httpErrors = false){
        $isDebugEnabled = env('APP_DEBUG');
        if ($isDebugEnabled) {
            $executionStartTime = microtime(true);
        }

        $client = new Client(['base_uri' => $serviceBaseUri]);
        $options['http_errors'] = $httpErrors;
        if (!empty($jwtToken)) {
            $options['headers']['Authorization'] = $jwtToken;
        }
        $uri = ltrim($uri, '/');
        $request = $client->request($method, $uri, $options);
        if ($isDebugEnabled) {
            $executionEndTime = microtime(true);
            $seconds = $executionEndTime - $executionStartTime;
            $url = $serviceBaseUri.$uri;
            //Log::debug('[API DEBUG] Call ' . $url . ' take ' . $seconds . ' - response http status code: ' . $request->getStatusCode().' - options: '.json_encode($options));
        }
        return $request;
    }
}

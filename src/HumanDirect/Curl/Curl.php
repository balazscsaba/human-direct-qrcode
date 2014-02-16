<?php

namespace HumanDirect\Curl;

use HumanDirect\Exception\RuntimeException;

/**
 * HumanDirect cUrl class
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
class Curl
{
    /**
     * Timeout in seconds
     *
     * @var null
     */
    private static $timeout = null;

    /**
     * Set timeout
     *
     * @param integer $seconds
     */
    public static function timeout($seconds)
    {
        self::$timeout = $seconds;
    }

    /**
     * Send a GET request to a URL
     *
     * @param string $url URL to send the request to
     * @throws RuntimeException if a cURL error occurs
     * @return CurlResponse
     */
    public static function get($url)
    {
        $headers = array(
            'user-agent: humandirect curl',
            'expect:'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, \TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, \TRUE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, \TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, \FALSE);
        curl_setopt($ch, CURLOPT_ENCODING, "");

        if (!is_null(self::$timeout)) {
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$timeout);
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);

        if ($error) {
            throw new RuntimeException($error);
        }

        $curlInfo = curl_getinfo($ch);
        $headerSize = $curlInfo["header_size"];
        $httpCode = $curlInfo["http_code"];
        $httpHeaders = substr($response, 0, $headerSize);
        $httpResponse = substr($response, $headerSize);

        return new CurlResponse($httpCode, $httpResponse, $httpHeaders);
    }
}

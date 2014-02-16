<?php

namespace HumanDirect\Http;

/**
 * HumanDirect HTTP response class
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
class HttpResponse
{
    /**
     * Send response to output
     *
     * @param $response
     * @param array $headers
     */
    public static function output($response = \NULL, $headers = array())
    {
        $contentType = isset($headers['Content-Type']) ? $headers['Content-Type'] : 'text/html';

        header('HTTP/1.1 201 Created');
        header(sprintf('Content-type: %s; charset=utf-8', $contentType));
        echo $response;
        exit;
    }
}

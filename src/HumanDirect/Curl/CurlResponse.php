<?php

namespace HumanDirect\Curl;

/**
 * HumanDirect cUrl response class
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
class CurlResponse
{
    /**
     * Response code
     *
     * @var integer
     */
    private $code;

    /**
     * Response content
     *
     * @var string
     */
    private $content;

    /**
     * Response hraders
     *
     * @var string
     */
    private $headers;

    /**
     * @param int $httpCode
     * @param string $httpResponse
     * @param string $httpHeaders
     */
    public function __construct($httpCode, $httpResponse, $httpHeaders)
    {
        $this->code = $httpCode;
        $this->content = $httpResponse;
        $this->headers = $this->getHeadersFromResponse($httpHeaders);
    }

    /**
     * Get response code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get response content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get response headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get headers as array from cURL response string
     *
     * @param  string $httpHeaders
     * @return array
     */
    private function getHeadersFromResponse($httpHeaders)
    {
        $httpHeaders = explode("\r\n", $httpHeaders);
        array_shift($httpHeaders);

        $result = array();
        foreach ($httpHeaders as $line) {
            $needle = ': ';
            if (strstr($line, $needle) === \FALSE) {
                continue;
            }

            list ($key, $value) = explode($needle, $line);
            $result[$key] = $value;
        }

        return $result;
    }
}

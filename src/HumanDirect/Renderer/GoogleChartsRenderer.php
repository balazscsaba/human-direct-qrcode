<?php

namespace HumanDirect\Renderer;

use HumanDirect\Curl\Curl;
use HumanDirect\Curl\CurlResponse;
use HumanDirect\Exception\QrCodeException;
use HumanDirect\Exception\RuntimeException;
use HumanDirect\Http\HttpResponse;

/**
 * HumanDirect Google Charts renderer
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
class GoogleChartsRenderer extends RendererAbstract
{
    /**
     * Draw QR code
     *
     * @throws RuntimeException
     * @return CurlResponse
     */
    public function draw()
    {
        $url = $this->getQrUrl() . '?' . http_build_query(array(
            'cht'  => 'qr',
            'chs'  => sprintf("%dx%d", $this->getWidth(), $this->getHeight()),
            'chl'  => $this->getText(),
            'choe' => $this->getOutputEncoding(),
            'chld' => sprintf("%s|%d", $this->getErrorCorrectionLevel(), $this->getMargin())
        ));

        try {
            $response = Curl::get($url);

            if (!$response instanceof CurlResponse) {
                throw new RuntimeException('Failed to generate the Qr code image resource.');
            }

            HttpResponse::output($response->getContent(), $response->getHeaders());
        } catch (QrCodeException $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
}

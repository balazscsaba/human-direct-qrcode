<?php

namespace HumanDirect;

use HumanDirect\Renderer\RendererInterface;

/**
 * HumanDirect interface
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
interface QrCodeInterface
{
    /**
     * Get QR code renderer
     *
     * @return RendererInterface
     */
    public function getRenderer();

    /**
     * Set QR code renderer
     *
     * @param RendererInterface $renderer
     * @return mixed
     */
    public function setRenderer(RendererInterface $renderer);

    /**
     * Generate QR code
     *
     * @return mixed
     */
    public function generate();
}

<?php

namespace HumanDirect\Renderer;

/**
 * Renderer interface
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
interface RendererInterface
{
    /**
     * Draw QR code
     *
     * @return mixed
     */
    public function draw();
}

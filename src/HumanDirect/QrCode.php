<?php

namespace HumanDirect;

/**
 * HumanDirect bootstrap
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
class QrCode extends QrCodeAbstract
{
    /**
     * Generate QR code
     *
     * @return mixed|void
     */
    public function generate()
    {
        $this->getRenderer()->draw();
    }
}

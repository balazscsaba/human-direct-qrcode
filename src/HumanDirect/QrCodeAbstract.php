<?php

namespace HumanDirect;

use HumanDirect\Renderer\RendererInterface;
use HumanDirect\Exception\InvalidArgumentException;
use HumanDirect\Exception\RuntimeException;

/**
 * HumanDirect abstract class
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
abstract class QrCodeAbstract implements QrCodeInterface
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var integer
     */
    protected $width;
    /**
     * @var integer
     */
    protected $height;
    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * Constructor
     *
     * @param $text
     * @param $width
     * @param $height
     * @throws InvalidArgumentException
     */
    public function __construct($text, $width, $height)
    {
        if (!is_string($text) || empty($text)) {
            throw new InvalidArgumentException('Argument "text" in invalid. Not empty string expected.');
        }

        if (!is_integer($width) || $width <= 0) {
            throw new InvalidArgumentException('Argument "width" in invalid. Greater than zero integer expected.');
        }

        if (!is_integer($height) || $height <= 0) {
            throw new InvalidArgumentException('Argument "height" in invalid. Greater than zero integer expected.');
        }

        $this->text = $text;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get QR code renderer
     *
     * @throws RuntimeException
     * @return RendererInterface
     */
    public function getRenderer()
    {
        if (!$this->renderer instanceof RendererInterface) {
            throw new RuntimeException('Renderer must be an instance of RendererInterface.');
        }

        return $this->renderer;
    }

    /**
     * Set QR code renderer
     *
     * @param RendererInterface $renderer
     * @return mixed
     */
    public function setRenderer(RendererInterface $renderer)
    {
        $renderer->setText($this->text);
        $renderer->setWidth($this->width);
        $renderer->setHeight($this->height);

        $this->renderer = $renderer;
    }

    /**
     * Generate QR code
     *
     * @return mixed
     */
    abstract public function generate();
}

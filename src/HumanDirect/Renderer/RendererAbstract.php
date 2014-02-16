<?php

namespace HumanDirect\Renderer;

/**
 * HumanDirect renderer adapter abstract class
 *
 * @package      HumanDirect
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2014 Balazs Csaba
 */
abstract class RendererAbstract implements RendererInterface
{
    /**
     * Data in the Qr code
     *
     * @var string
     */
    protected $text;

    /**
     * Width of the generated image resource
     *
     * @var integer
     */
    protected $width;

    /**
     * Height of the generated image resource
     *
     * @var integer
     */
    protected $height;

    /**
     * Encoding of data in the Qr code
     * Possible values: UTF-8, Shift_JIS, ISO-8859-1
     *
     * @var string
     */
    protected $outputEncoding = "UTF-8";

    /**
     * QR code error correction level
     * Possible values:
     *      L - [Default] Allows recovery of up to 7% data loss
     *      M - Allows recovery of up to 15% data loss
     *      Q - Allows recovery of up to 25% data loss
     *      H - Allows recovery of up to 30% data loss
     *
     * @var string
     */
    protected $errorCorrectionLevel = "L";

    /**
     * The width in rows (not in pixels) of the white border around the data portion of the code.
     *
     * @var int
     */
    protected $margin = 4;

    /**
     * @const QR code URL
     */
    const QR_URL = "https://chart.googleapis.com/chart";

    /**
     * Draw QR code
     *
     * @return mixed
     */
    abstract public function draw();

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = (int) $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = (int) $height;
    }

    /**
     * Get Qr URL
     *
     * @return string
     */
    protected function getQrUrl()
    {
        return self::QR_URL;
    }

    /**
     * Get output encoding
     *
     * @return string
     */
    protected function getOutputEncoding()
    {
        return $this->outputEncoding;
    }

    /**
     * Get error correction level
     *
     * @return string
     */
    protected function getErrorCorrectionLevel()
    {
        return $this->errorCorrectionLevel;
    }

    /**
     * Get margin of image resource
     *
     * @return int
     */
    protected function getMargin()
    {
        return (int) $this->margin;
    }
}

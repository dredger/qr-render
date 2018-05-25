<?php
/**
 * Created by .
 * User: dredger
 * Date: 5/24/2018
 * Time: 16:45
 */
namespace DredgerQr\QrCode;

use DredgerQr\QrCode\Renderer\RendererInterface;

class QrCodeGenerator
{


    private $renderer;

    /**
     * QrCodeGenerator constructor.
     *
     * @param RendererInterface  $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param $text string Text wich should coded
     * @param $width int
     * @param $height int
     * @return
     */
    public function generate($text, $width, $height)  // text, width, height
    {
        return $this->renderer->render($text, $width, $height);
    }
}

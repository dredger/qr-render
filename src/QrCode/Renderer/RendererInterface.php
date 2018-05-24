<?php
/**
 * Created by .
 * User: dredger
 * Date: 5/24/2018
 * Time: 16:46
 */

namespace DredgerQr\QrCode\Renderer;



interface RendererInterface
{
    /**
     * @param $text string That value is a text wich should coded
     * @param $width
     * @param $height
     *
     * @return mixed
     */
     function render($text, $width, $height);
}

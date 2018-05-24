<?php
/**
 * Created by .
 * User: dredger
 * Date: 5/24/2018
 * Time: 16:46
 */

namespace DredgerQr\QrCode\Renderer;

use DredgerQr\QrCode\Renderer\RendererInterface;
use GuzzleHttp\ClientInterface;

class GoogleChartsRenderer implements RendererInterface
{
    /**
     * @var ClientInterface
     */
    private $client;


    const RENDER_URI = 'https://chart.googleapis.com/chart';

    /**
     * GoogleChartsRenderer constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $text
     * @param int $width
     * @param int $height
     * @return binary image
     */
    public function render($text, $width, $height)
    {
        $response = $this->client->request('get', self::RENDER_URI, ['query' => [
            'cht' => 'qr',
            'chs' => sprintf('%dx%d', $width, $height),
            'chl' => $text,
        ]]);

        return $response->getBody()->getContents();
    }
}

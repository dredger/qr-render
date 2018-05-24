<?php

namespace DredgerQr\QrCode\Tests\Unit\Renderer;

use DredgerQr\QrCode\Renderer\GoogleChartsRenderer;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class GoogleChartsRendererTest extends \PHPUnit_Framework_TestCase
{

    public function testRenderShouldGetHttpRequest()
    {
        $c = $this->getMock(ClientInterface::class);
        $c->expects($this->once())
            ->method('request')
            ->with('get', 'https://chart.googleapis.com/chart', [ 'query' => [
                'cht' => 'qr',
                'chs' => '50x60',
                'chl' => 'TrekkSoft',
            ]])
            ->willReturn(new Response())
        ;

        $renderer = new GoogleChartsRenderer($c);
        $renderer->render('TrekkSoft', 50, 60);  // text, width, height
    }

    public function testRenderShouldProcessResponse()
    {
        $imgData = "ThisIsBinaryDataOfImage";

        $c = $this->getMock(ClientInterface::class);
        $c->expects($this->once())
            ->method('request')
            ->willReturn(new Response(200, [], $imgData));

        $renderer = new GoogleChartsRenderer($c);
        $data = $renderer->render('TrekkSoft', 50, 60);  // text, width, height

        $this->assertEquals($imgData, $data);
    }
}

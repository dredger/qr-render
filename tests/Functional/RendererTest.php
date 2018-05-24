<?php
namespace DredgerQr\QrCode\Tests\Functional;

use DredgerQr\QrCode\QrCodeGenerator;
use DredgerQr\QrCode\Renderer\GoogleChartsRenderer;
use DredgerQr\QrCode\RendererInterface;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{
    public function testGeneratorOnGoogleRenderer()
    {
        $qrCodeGenerator = new QrCodeGenerator(new GoogleChartsRenderer(new Client()));

        $this->assertStringEqualsFile(
            __DIR__ . '/fixture/trekk_soft_50x50.png',
            $qrCodeGenerator->generate('Trekk Soft', 50, 50)
        );

        $this->assertStringEqualsFile(
            __DIR__ . '/fixture/another_value_200x150.png',
            $qrCodeGenerator->generate('Another Value', 200, 150)
        );

    }
}

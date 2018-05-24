<?php

namespace DredgerQr\QrCode\Tests\Unit;

use DredgerQr\QrCode\QrCodeGenerator;
use DredgerQr\QrCode\Renderer\RendererInterface;

use PHPUnit\Framework\TestCase;

class QrCodeGeneratorTest extends TestCase
{
    public function testRendererInterface()
    {
        $rendererMock = $this->createMock(RendererInterface::class);

//        $rendererMock->expects(
//            $this->once())
//            ->method('render')
//            ->with('TrekkSoft', 100, 100);
    }

    public function testGenerateCallRenderer()
    {

        $rendererMock = $this->createMock(RendererInterface::class);
//        $this->assertInstanceOf('RendererInterface', $rendererMock);


        $qrCode = new QrCodeGenerator($rendererMock);
        $qrCode->generate('TrekkSoft', 150, 160);  // text, width, height
    }

    public function testGenerateReturnData()
    {
        $imgData = "ThisIsBinaryDataOfImage";
        $rendererMock = $this->createMock(RendererInterface::class);
        $rendererMock->method('render')
            ->willReturn($imgData);

        $qrCode = new QrCodeGenerator($rendererMock);
        $qrCodeData = $qrCode->generate('TrekkSoft', 50, 50);  // text, width, height

        $this->assertEquals($imgData, $qrCodeData);
    }
}

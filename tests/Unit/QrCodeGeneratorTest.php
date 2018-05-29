<?php

namespace DredgerQr\QrCode\Tests\Unit;

use DredgerQr\QrCode\QrCodeGenerator;
use DredgerQr\QrCode\Renderer\RendererInterface;

use PHPUnit\Framework\TestCase;

class QrCodeGeneratorTest extends TestCase
{
    public function testRendererInterface()
    {
        $mock = $this->getMockBuilder(RendererInterface::class) ->getMock();

        $mock->expects($this->once())
                     ->method('render')
                     ->with('TrekkSoft', 100, 100);

        $qrCode = new QrCodeGenerator($mock);
        $qrCode->generate('TrekkSoft', 100, 100);
    }


    public function testGenerateCallRenderer()
    {

        $mock = $this->getMockBuilder(RendererInterface::class) ->getMock();
        $this->assertInstanceOf(RendererInterface::class, $mock);


        $qrCode = new QrCodeGenerator($mock);
        $qrCode->generate('TrekkSoft', 150, 160);
    }

    public function testGenerateReturnData()
    {
        $imgData = "ThisIsBinaryDataOfImage";

        $mock = $this->getMockBuilder(RendererInterface::class) ->getMock();

        $mock->method('render') ->willReturn($imgData);

        $qrCode = new QrCodeGenerator($mock);
        $qrCodeData = $qrCode->generate('TrekkSoft', 50, 50);

        $this->assertEquals($imgData, $qrCodeData);
    }
}

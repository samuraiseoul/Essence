<?php


namespace Http\Messages\Response\StartLine;


use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLine;
use PHPUnit\Framework\TestCase;

class EssenceResponseStartLineTest extends TestCase
{
    private const STATUS_CODE = '200';

    private const STATUS_TEXT = 'OK';

    private const PROTOCOL_VERSION = 'HTTP/1.0';

    public function testGetProtocol(): void {
        $this->assertEquals(self::PROTOCOL_VERSION, $this->getEssenceResponseStartLine()->getProtocol());
    }

    public function testGetStatusCode(): void {
        $this->assertEquals(self::STATUS_CODE, $this->getEssenceResponseStartLine()->getStatusCode());
    }

    public function testGetStatusText(): void {
        $this->assertEquals(self::STATUS_TEXT, $this->getEssenceResponseStartLine()->getStatusText());
    }

    private function getEssenceResponseStartLine(): EssenceResponseStartLine {
        return new EssenceResponseStartLine(self::PROTOCOL_VERSION, self::STATUS_CODE, self::STATUS_TEXT);
    }
}
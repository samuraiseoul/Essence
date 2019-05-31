<?php


namespace Http\Messages\Response\StartLine;


use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLine;
use PHPUnit\Framework\TestCase;

class EssenceResponseStartLineTest extends TestCase
{
    private const STATUS_CODE = '200';

    private const STATUS_TEXT = 'OK';

    private const PROTOCOL_VERSION = 'HTTP/1.0';

    public function testGetProtocol() {
        $startLine = new EssenceResponseStartLine(self::PROTOCOL_VERSION, self::STATUS_CODE, self::STATUS_TEXT);
        $this->assertEquals(self::PROTOCOL_VERSION, $startLine->getProtocol());
    }

    public function testGetStatusCode() {
        $startLine = new EssenceResponseStartLine(self::PROTOCOL_VERSION, self::STATUS_CODE, self::STATUS_TEXT);
        $this->assertEquals(self::STATUS_CODE, $startLine->getStatusCode());
    }

    public function testGetStatusText() {
        $startLine = new EssenceResponseStartLine(self::PROTOCOL_VERSION, self::STATUS_CODE, self::STATUS_TEXT);
        $this->assertEquals(self::STATUS_TEXT, $startLine->getStatusText());
    }
}
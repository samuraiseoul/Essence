<?php


namespace Essence\Tests\Http\Messages\Request\Headers;


use Essence\Http\Messages\Headers\EssenceHeader;
use PHPUnit\Framework\TestCase;

class EssenceHeaderTest extends TestCase
{
    private const HEADER_VALUE = 'headerValue';

    private const HEADER_NAME = 'headerName';

    public function testNameGetter() : void {
        $header = new EssenceHeader(self::HEADER_NAME, self::HEADER_VALUE);
        $this->assertEquals(self::HEADER_NAME, $header->getHeaderName());
    }

    public function testValueGetter() : void {
        $header = new EssenceHeader(self::HEADER_NAME, self::HEADER_VALUE);
        $this->assertEquals(self::HEADER_VALUE, $header->getHeaderValue());
    }
}
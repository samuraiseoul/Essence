<?php


namespace Essence\Tests\Http\Messages\Request\Headers;


use Essence\Http\Messages\Request\Headers\EssenceRequestHeaders;
use Essence\Http\Messages\Request\Headers\RequestHeader;
use PHPUnit\Framework\TestCase;

class EssenceRequestHeadersTest extends TestCase
{
    const HEADER_VALUE = 'headerValue';
    const HEADER_NAME = 'headerName';

    public function testRequestHeadersGet() {
        $headers = new EssenceRequestHeaders([$this->createHeader()]);
        $this->assertEquals(self::HEADER_VALUE, $headers->get(self::HEADER_NAME)->getHeaderValue());
    }

    public function testRequestHeadersGetWithDifferentStartIndex() {
        $headers = new EssenceRequestHeaders([2345 => $this->createHeader()]);
        $this->assertEquals(self::HEADER_VALUE, $headers->get(self::HEADER_NAME)->getHeaderValue());
    }

    private function createHeader() {
        $header = $this->createMock(RequestHeader::class);
        $header->method('getHeaderName')->willReturn(self::HEADER_NAME);
        $header->method('getHeaderValue')->willReturn(self::HEADER_VALUE);
        return $header;
    }
}
<?php


namespace Essence\Tests\Http\Messages\Request\Headers;


use Essence\Http\Messages\Headers\EssenceHeaders;
use Essence\Http\Messages\Headers\Header;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceHeadersTest extends TestCase
{
    private const HEADER_VALUE = 'headerValue';

    private const HEADER_NAME = 'headerName';

    public function testRequestHeadersGet() : void {
        $headers = new EssenceHeaders([$this->createHeader()]);
        $this->assertEquals(self::HEADER_VALUE, $headers->get(self::HEADER_NAME)->getHeaderValue());
    }

    public function testRequestHeadersGetWithDifferentStartIndex() : void {
        $headers = new EssenceHeaders([2345 => $this->createHeader()]);
        $this->assertEquals(self::HEADER_VALUE, $headers->get(self::HEADER_NAME)->getHeaderValue());
    }

    /**
     * @return MockObject | Header
     * @throws ReflectionException
     */
    private function createHeader() {
        $header = $this->createMock(Header::class);
        $header->method('getHeaderName')->willReturn(self::HEADER_NAME);
        $header->method('getHeaderValue')->willReturn(self::HEADER_VALUE);
        return $header;
    }
}
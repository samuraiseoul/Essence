<?php


namespace Essence\Tests\Http\Messages\Request;


use Essence\Http\Messages\Body;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use ReflectionException;

class EssenceRequestTest extends TestCase
{
    public function testPsrConversion() {
        $request = new EssenceRequest($this->getMockStartLine(), $this->getMockHeaders(), $this->getMockBody());
        $this->assertInstanceOf(RequestInterface::class, $request->toPsr7());
    }

    public function testStartLineType() {
        $request = new EssenceRequest($this->getMockStartLine(), $this->getMockHeaders(), $this->getMockBody());
        $this->assertInstanceOf(RequestStartLine::class, $request->getStartLine());
    }

    public function testHeadersType() {
        $request = new EssenceRequest($this->getMockStartLine(), $this->getMockHeaders(), $this->getMockBody());
        $this->assertInstanceOf(Headers::class, $request->getHeaders());
    }

    public function testBodyType() {
        $request = new EssenceRequest($this->getMockStartLine(), $this->getMockHeaders(), $this->getMockBody());
        $this->assertInstanceOf(Body::class, $request->getBody());
    }

    /**
     * @return MockObject | RequestStartLine
     * @throws ReflectionException
     */
    private function getMockStartLine() {
        $mockStartLine = $this->createMock(RequestStartLine::class);
        return $mockStartLine;
    }

    /**
     * @return MockObject | Headers
     * @throws ReflectionException
     */
    private function getMockHeaders() {
        $mockHeaders = $this->createMock(Headers::class);
        return $mockHeaders;
    }

    /**
     * @return MockObject | Body
     * @throws ReflectionException
     */
    private function getMockBody() {
        $mockBody = $this->createMock(Body::class);
        return $mockBody;
    }
}
<?php


namespace Essence\Tests\Http\Messages\Request;


use Essence\Http\Messages\Request\Body\RequestBody;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\Headers\RequestHeaders;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestTest extends TestCase
{
    public function testGetStartLine() : void {
        $startLine = $this->getMockStartLine();
        $request = new EssenceRequest($startLine, $this->getMockHeaders(), $this->getMockBody());
        $this->assertEquals($startLine, $request->getStartLine());
    }

    public function testGetHeaders() : void {
        $requestHeaders = $this->getMockHeaders();
        $request = new EssenceRequest($this->getMockStartLine(), $requestHeaders, $this->getMockBody());
        $this->assertEquals($requestHeaders, $request->getHeaders());
    }

    public function testGetBody() : void {
        $requestBody = $this->getMockBody();
        $request = new EssenceRequest($this->getMockStartLine(), $this->getMockHeaders(), $requestBody);
        $this->assertEquals($requestBody, $request->getBody());
    }

    /**
     * @return MockObject | RequestStartLine
     * @throws ReflectionException
     */
    private function getMockStartLine() {
        return $this->createMock(RequestStartLine::class);
    }

    /**
     * @return MockObject | RequestHeaders
     * @throws ReflectionException
     */
    private function getMockHeaders() {
        return $this->createMock(RequestHeaders::class);
    }

    /**
     * @return MockObject | RequestBody
     * @throws ReflectionException
     */
    private function getMockBody() {
        return $this->createMock(RequestBody::class);
    }
}
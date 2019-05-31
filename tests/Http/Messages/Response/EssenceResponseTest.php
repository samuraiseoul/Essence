<?php


namespace Http\Messages\Response;


use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Response\EssenceResponse;
use Essence\Http\Messages\Response\StartLine\ResponseStartLine;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceResponseTest extends TestCase
{
    public function testGetStartLine() : void {
        $startLine = $this->getMockStartLine();
        $request = new EssenceResponse($startLine, $this->getMockHeaders(), $this->getMockBody());
        $this->assertEquals($startLine, $request->getStartLine());
    }

    public function testGetHeaders() : void {
        $requestHeaders = $this->getMockHeaders();
        $request = new EssenceResponse($this->getMockStartLine(), $requestHeaders, $this->getMockBody());
        $this->assertEquals($requestHeaders, $request->getHeaders());
    }

    public function testGetBody() : void {
        $requestBody = $this->getMockBody();
        $request = new EssenceResponse($this->getMockStartLine(), $this->getMockHeaders(), $requestBody);
        $this->assertEquals($requestBody, $request->getBody());
    }

    /**
     * @return MockObject | ResponseStartLine
     * @throws ReflectionException
     */
    private function getMockStartLine() {
        return $this->createMock(ResponseStartLine::class);
    }

    /**
     * @return MockObject | Headers
     * @throws ReflectionException
     */
    private function getMockHeaders() {
        return $this->createMock(Headers::class);
    }

    /**
     * @return MockObject | Body
     * @throws ReflectionException
     */
    private function getMockBody() {
        return $this->createMock(Body::class);
    }

}
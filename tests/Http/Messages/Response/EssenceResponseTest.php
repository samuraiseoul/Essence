<?php


namespace Http\Messages\Response;


use Essence\Http\Messages\Body\EssenceBodyInterface;
use Essence\Http\Messages\Headers\EssenceHeadersInterface;
use Essence\Http\Messages\Response\EssenceResponse;
use Essence\Http\Messages\Response\StartLine\EssenceResponseStartLineInterface;
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
     * @return MockObject | EssenceResponseStartLineInterface
     * @throws ReflectionException
     */
    private function getMockStartLine() {
        return $this->createMock(EssenceResponseStartLineInterface::class);
    }

    /**
     * @return MockObject | EssenceHeadersInterface
     * @throws ReflectionException
     */
    private function getMockHeaders() {
        return $this->createMock(EssenceHeadersInterface::class);
    }

    /**
     * @return MockObject | EssenceBodyInterface
     * @throws ReflectionException
     */
    private function getMockBody() {
        return $this->createMock(EssenceBodyInterface::class);
    }

}
<?php


namespace Essence\Tests\Http\Messages\Request\StartLine;


use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLine;
use Essence\Http\Messages\Request\StartLine\RequestTarget;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestStartLineTest extends TestCase
{
    private const VALID_VERB = 'GET';

    private const INVALID_VERB = 'OPTIONS';
    const HTTP_VERSION = '1';

    public function testGetHttpMethod() {
        $startLine = new EssenceRequestStartLine(self::VALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
        $this->assertEquals(self::VALID_VERB, $startLine->getHTTPMethod());
    }

    public function testHttpMethodValidator() {
        $this->expectException(\InvalidArgumentException::class);
        new EssenceRequestStartLine(self::INVALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
    }

    public function testGetHttpVersion() {
        $startLine = new EssenceRequestStartLine(self::VALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
        $this->assertEquals(self::HTTP_VERSION, $startLine->getHTTPVersion());
    }

    /**
     * @return MockObject | RequestTarget
     * @throws ReflectionException
     */
    private function getMockRequestTarget()
    {
        $requestTargetMock = $this->createMock(RequestTarget::class);
        return $requestTargetMock;
    }
}
<?php


namespace Essence\Tests\Http\Messages\Request\StartLine;


use Essence\Http\Messages\Request\StartLine\EssenceRequestStartLine;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTargetInterface;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestStartLineTest extends TestCase
{
    private const VALID_VERB = 'GET';

    private const INVALID_VERB = 'OPTIONS';

    private const HTTP_VERSION = 'HTTP/1.0';

    public function testGetHttpMethod() : void {
        $startLine = new EssenceRequestStartLine(self::VALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
        $this->assertEquals(self::VALID_VERB, $startLine->getHTTPMethod());
    }

    public function testHttpMethodValidator() : void {
        $this->expectException(InvalidArgumentException::class);
        new EssenceRequestStartLine(self::INVALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
    }

    public function testGetHttpVersion() : void {
        $startLine = new EssenceRequestStartLine(self::VALID_VERB, $this->getMockRequestTarget(), self::HTTP_VERSION);
        $this->assertEquals(self::HTTP_VERSION, $startLine->getHTTPVersion());
    }

    /**
     * @return MockObject | EssenceRequestTargetInterface
     * @throws ReflectionException
     */
    private function getMockRequestTarget()
    {
        return $this->createMock(EssenceRequestTargetInterface::class);
    }
}
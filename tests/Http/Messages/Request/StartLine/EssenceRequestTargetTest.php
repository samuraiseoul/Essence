<?php


namespace Essence\Tests\Http\Messages\Request\StartLine;


use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;
use Essence\Http\Messages\Request\StartLine\EssenceRequestTarget;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestTargetTest extends TestCase
{
    private const QUERY_PARAMETER_KEY = 'fakeKey';
    private const QUERY_PARAMETER_VALUE = 'fakeQueryParam';

    public function testGetPath() : void {
        $requestTarget = new EssenceRequestTarget($this->getFakePath(), $this->getQueryParametersMock());
        $this->assertEquals($this->getFakePath(), $requestTarget->getPath());
    }

    public function testQueryParameters() : void {
        $requestTarget = new EssenceRequestTarget($this->getFakePath(), $this->getQueryParametersMock());
        $this->assertEquals(self::QUERY_PARAMETER_VALUE, $requestTarget->getQueryStrings()->getAsString(self::QUERY_PARAMETER_KEY));
    }

    /**
     * @return MockObject | EssenceQueryParametersInterface
     * @throws ReflectionException
     */
    public function getQueryParametersMock() : MockObject {
        $queryParametersMock = $this->createMock(EssenceQueryParametersInterface::class);
        $queryParametersMock->method('getAsString')
            ->with(self::QUERY_PARAMETER_KEY)
            ->willReturn(self::QUERY_PARAMETER_VALUE);
        return $queryParametersMock;
    }

    /**
     * @return string
     */
    private function getFakePath(): string
    {
        return 'fakepath/fakefile.php?' . self::QUERY_PARAMETER_KEY . '=' . self::QUERY_PARAMETER_VALUE;
    }
}
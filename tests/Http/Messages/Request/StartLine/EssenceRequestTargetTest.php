<?php


namespace Essence\Tests\Http\Messages\Request\StartLine;


use Essence\Http\Messages\Request\StartLine\EssenceRequestTarget;
use Essence\Http\Messages\Request\StartLine\QueryParameters;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class EssenceRequestTargetTest extends TestCase
{
    const QUERY_PARAMETER_KEY = 'fakeKey';
    const QUERY_PARAMETER_VALUE = 'fakeQueryParam';

    public function testGetPath() {
        $requestTarget = new EssenceRequestTarget('fakepath/fakefile.php?', $this->getQueryParametersMock());
    }

    /**
     * @return MockObject | QueryParameters
     * @throws ReflectionException
     */
    public function getQueryParametersMock() : MockObject {
        $queryParametersMock = $this->createMock(QueryParameters::class);
        $queryParametersMock->method('get')
            ->with(self::QUERY_PARAMETER_KEY)
            ->willReturn(self::QUERY_PARAMETER_VALUE);
        return $queryParametersMock;
    }
}
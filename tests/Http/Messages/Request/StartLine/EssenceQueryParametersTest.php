<?php


namespace Essence\Tests\Http\Messages\Request\StartLine;


use Essence\Http\Messages\Request\StartLine\EssenceQueryParameters;
use PHPUnit\Framework\TestCase;

class EssenceQueryParametersTest extends TestCase
{
    private const KEY = 'key';

    private const VALUE = 'value';

    public function testGetQueryParameter() : void {
        $queryParameters = new EssenceQueryParameters([self::KEY => self::VALUE]);
        $this->assertEquals(self::VALUE, $queryParameters->get(self::KEY));
    }
}
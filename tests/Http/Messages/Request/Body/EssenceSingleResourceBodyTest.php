<?php


namespace Http\Messages\Request\Body;


use Essence\Http\Messages\Request\Body\EssenceSingleResourceBody;
use PHPUnit\Framework\TestCase;

class EssenceSingleResourceBodyTest extends TestCase
{
    private const PRE_SERIALIZED_JSON = [
        'field' => 'value',
        'array_field' => [1, 2, 3],
        'map_field' => ['map_sub_field' => 'sub_value']
    ];

    public function testGetSingleResourceBody() : void {
        $singleResourceBody = new EssenceSingleResourceBody(json_encode(self::PRE_SERIALIZED_JSON));
        $this->assertEquals(json_encode(self::PRE_SERIALIZED_JSON), $singleResourceBody->getContents());
    }
}
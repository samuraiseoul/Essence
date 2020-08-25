<?php


namespace Http\Messages\Request\Body;


use Essence\Http\Messages\Body\Request\EssenceSingleResourceRequestBody;
use PHPUnit\Framework\TestCase;

class EssenceSingleResourceBodyTest extends TestCase
{
    private const PRE_SERIALIZED_JSON = [
        'field' => 'value',
        'array_field' => [1, 2, 3],
        'map_field' => ['map_sub_field' => 'sub_value']
    ];

    public function testGetSingleResourceBody() : void {
        $jsonBody = json_encode(self::PRE_SERIALIZED_JSON, JSON_THROW_ON_ERROR, 512);
        $singleResourceBody = new EssenceSingleResourceRequestBody($jsonBody);
        $this->assertEquals($jsonBody, $singleResourceBody->getContents());
    }
}
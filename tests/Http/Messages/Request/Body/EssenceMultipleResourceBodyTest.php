<?php


namespace Essence\Tests\Http\Messages\Request\Body;


use Essence\Http\Messages\Request\Body\EssenceMultipleResourceBody;
use PHPUnit\Framework\TestCase;

class EssenceMultipleResourceBodyTest extends TestCase
{
    private const PARTS = ['part1', 'part2'];

    public function testGetParts() : void {
        $multipleResourceBody = new EssenceMultipleResourceBody(self::PARTS);
        $this->assertEquals(self::PARTS, $multipleResourceBody->getParts());
    }
}
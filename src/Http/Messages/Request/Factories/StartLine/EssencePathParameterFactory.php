<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;


use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssencePathParameters;
use Essence\Http\Messages\Request\StartLine\PathParameters;

final class EssencePathParameterFactory implements PathParameterFactory
{
    /** @var PathParameters */
    private $pathParameters;

    public function getPathParameters(): PathParameters
    {
        return $this->pathParameters ?? $this->pathParameters = $this->createPathParameters();
    }

    public function createPathParameters() : PathParameters {
        if($this->pathParameters) {
            throw new BadMethodCallException('Path Parameters already instantiated!');
        }
        return new EssencePathParameters([]);
    }
}
<?php


namespace Essence\Http\Messages\Request\Factories\StartLine;


use BadMethodCallException;
use Essence\Http\Messages\Request\StartLine\EssencePathParameters;
use Essence\Http\Messages\Request\StartLine\PathParameters;
use InvalidArgumentException;
use OutOfBoundsException;

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
        $pathParts = $this->getPathParts($_SERVER['REQUEST_URI']);
        $pathParameters = [];
        foreach ($pathParts as $i => $pathPart) {
            if(is_numeric($pathPart)) {
                if(($i - 1) < 0) {
                    throw new OutOfBoundsException('First part of the path can not be a numeric for default path parameter parsing');
                }
                if(is_numeric($pathParts[$i - 1])) {
                    throw new InvalidArgumentException('Prefix for path parameter id can not be a numerical value');
                }
                $idPrefix = strtolower($pathParts[$i - 1]);
                $pathParameterName = $idPrefix . 'Id';
                $pathParameters[$pathParameterName] = $pathPart;
            }
        }
        return new EssencePathParameters($pathParameters);
    }

    private function getPathParts(string $fullPath) : array {
        $pathWithoutQueryStrings = explode('?', $fullPath)[0];
        return explode('/', $pathWithoutQueryStrings);
    }
}
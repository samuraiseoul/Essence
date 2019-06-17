<?php


namespace Essence\Http\Router;


use Essence\Http\Messages\Request\StartLine\EssencePathParameters;
use Essence\Http\Messages\Request\StartLine\PathParameters;
use InvalidArgumentException;
use OutOfBoundsException;

abstract class AbstractEssenceRouter implements Router
{
    public function getEndpointPath() : string
    {
        $pathParts = explode('/', $_SERVER['REQUEST_URI']);
        $nonNumericPathParts = array_filter($pathParts, function(string $pathPart) {
            return !is_numeric($pathPart);
        });
        return implode('/', $nonNumericPathParts);
    }

    public function getPathParameters(): PathParameters
    {
        $pathParts = explode('/', $_SERVER['REQUEST_URI']);
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
}
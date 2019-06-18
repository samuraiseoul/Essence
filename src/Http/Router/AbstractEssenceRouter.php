<?php


namespace Essence\Http\Router;


use Essence\Http\Messages\Request\StartLine\EssencePathParameters;
use Essence\Http\Messages\Request\StartLine\PathParameters;
use InvalidArgumentException;
use OutOfBoundsException;

abstract class AbstractEssenceRouter implements Router
{
    public function route() : void {
        require_once($_SERVER['DOCUMENT_ROOT'] . $this->getEndpointPath() . '/index.php');
    }

    private function getEndpointPath() : string
    {
        $pathParts = $this->getPathParts($_SERVER['REQUEST_URI']);
        $nonNumericPathParts = array_filter($pathParts, function(string $pathPart) {
            return !is_numeric($pathPart);
        });
        $pathWithoutParameters = implode('/', $nonNumericPathParts);
        return $pathWithoutParameters;
    }

    private function getPathParts(string $fullPath) : array {
        $pathWithoutQueryStrings = explode('?', $fullPath)[0];
        return explode('/', $pathWithoutQueryStrings);
    }
}
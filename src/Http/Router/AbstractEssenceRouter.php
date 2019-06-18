<?php


namespace Essence\Http\Router;

abstract class AbstractEssenceRouter implements Router
{
    public function route() : void {
        require_once $_SERVER['DOCUMENT_ROOT'] . $this->getEndpointPath() . '/index.php';
    }

    private function getEndpointPath() : string
    {
        $pathParts = $this->getPathParts($_SERVER['REQUEST_URI']);
        $nonNumericPathParts = array_filter($pathParts, function(string $pathPart) {
            return !is_numeric($pathPart);
        });
        return implode('/', $nonNumericPathParts);
    }

    private function getPathParts(string $fullPath) : array {
        $pathWithoutQueryStrings = explode('?', $fullPath)[0];
        return explode('/', $pathWithoutQueryStrings);
    }
}
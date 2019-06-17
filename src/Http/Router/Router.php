<?php


namespace Essence\Http\Router;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Messages\Request\StartLine\PathParameters;

interface Router
{
    public function getEndpointPath() : string;

    public function getPathParameters() : PathParameters;
}
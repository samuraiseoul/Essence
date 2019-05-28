<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Response\Response;

interface EndpointHandlerInterface
{
    public function handleEndpoint(RequestInterface $request, Endpoint $endpoint) : Response;
}
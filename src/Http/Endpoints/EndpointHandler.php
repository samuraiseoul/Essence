<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Response\Response;

interface EndpointHandler
{
    public function handleEndpoint(Request $request, Endpoint $endpoint) : Response;
}
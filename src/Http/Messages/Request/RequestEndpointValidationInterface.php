<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Endpoints\Endpoint;

interface RequestEndpointValidationInterface
{
    public function endpointCanHandleRequest(Endpoint $endpoint, EssenceRequest $request) : bool;
}
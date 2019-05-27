<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Response\EssenceResponse;

interface EndpointHandlerInterface
{
    public function handleEndpoint(EssenceRequest $request, Endpoint $endpoint) : EssenceResponse;
}
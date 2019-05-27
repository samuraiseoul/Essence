<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Response\EssenceResponse;

interface EndpointHandlerInterface
{
    public function handleEndpoint(EssenceRequestInterface $request, Endpoint $endpoint) : EssenceResponse;
}
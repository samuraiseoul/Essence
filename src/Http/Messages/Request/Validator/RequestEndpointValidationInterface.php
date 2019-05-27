<?php


namespace Essence\Http\Messages\Request\Validator;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Messages\Request\EssenceRequestInterface;

interface RequestEndpointValidationInterface
{
    public function endpointCanHandleRequest(Endpoint $endpoint, EssenceRequestInterface $request) : bool;
}
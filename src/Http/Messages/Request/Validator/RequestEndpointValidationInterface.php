<?php


namespace Essence\Http\Messages\Request\Validator;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Messages\Request\RequestInterface;

interface RequestEndpointValidationInterface
{
    public function endpointCanHandleRequest(Endpoint $endpoint, RequestInterface $request) : bool;
}
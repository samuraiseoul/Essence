<?php


namespace Essence\Http\Messages\Request\Validator;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Messages\Request\Request;

interface RequestEndpointValidator
{
    public function endpointCanHandleRequest(Endpoint $endpoint, Request $request) : bool;
}
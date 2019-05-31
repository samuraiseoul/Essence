<?php


namespace Essence\Http\Messages\Request\Validator;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Endpoints\Methods\RestVerb;
use Essence\Http\Messages\Request\Request;

class EssenceRequestEndpointValidator implements RequestEndpointValidator
{
    public function endpointCanHandleRequest(Endpoint $endpoint, Request $request): bool
    {
        $expectedInterface = RestVerb::VERB_INTERFACE_MAP[$request->getStartLine()->getHTTPMethod()];
        return $endpoint instanceof $expectedInterface;
    }
}
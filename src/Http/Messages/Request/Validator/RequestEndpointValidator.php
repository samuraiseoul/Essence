<?php


namespace Essence\Http\Messages\Request\Validator;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Endpoints\Methods\RestVerb;
use Essence\Http\Messages\Request\EssenceRequestInterface;

class RequestEndpointValidator implements RequestEndpointValidationInterface
{
    public function endpointCanHandleRequest(Endpoint $endpoint, EssenceRequestInterface $request): bool
    {
        $expectedInterface = RestVerb::VERB_INTERFACE_MAP[$request->getStartLine()->getHTTPMethod()];
        return $endpoint instanceof $expectedInterface;
    }
}
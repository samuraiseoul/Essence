<?php


namespace Essence\Http\Messages\Request;


use Essence\Http\Endpoints\Endpoint;
use Essence\Http\Endpoints\Methods\RestVerb;

class RequestEndpointValidator implements RequestEndpointValidationInterface
{
    public function endpointCanHandleRequest(Endpoint $endpoint, EssenceRequestInterface $request): bool
    {
        $expectedInterface = RestVerb::VERB_INTERFACE_MAP[$request->getRestVerb()];
        return $endpoint instanceof $expectedInterface;
    }
}
<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\Validator\RequestEndpointValidator;
use Essence\Http\Messages\Response\Response;

final class EssenceEndpointHandler implements EndpointHandler
{
    /** @var RequestEndpointValidator */
    private $requestEndpointValidator;

    public function __construct(RequestEndpointValidator $requestEndpointValidator)
    {
        $this->requestEndpointValidator = $requestEndpointValidator;
    }

    final public function handleEndpoint(Request $request, Endpoint $endpoint) : Response {
        $this->validateRequest($request, $endpoint);
        return $this->processRequest($request, $endpoint);
    }

    private function processRequest(Request  $request, Endpoint $endpoint) : Response
    {
        $response = $endpoint->{strtolower($request->getStartLine()->getHTTPMethod())}($request);
        return $response;
    }

    private function validateRequest(Request  $request, Endpoint $endpoint) : void
    {
        $this->requestEndpointValidator->endpointCanHandleRequest($endpoint, $request);
    }
}
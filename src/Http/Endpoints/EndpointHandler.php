<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\RequestInterface;
use Essence\Http\Messages\Request\Validator\RequestEndpointValidationInterface;
use Essence\Http\Messages\Response\Response;

final class EndpointHandler implements EndpointHandlerInterface
{
    /** @var RequestEndpointValidationInterface */
    private $requestEndpointValidator;

    public function __construct(RequestEndpointValidationInterface $requestEndpointValidator)
    {
        $this->requestEndpointValidator = $requestEndpointValidator;
    }

    final public function handleEndpoint(RequestInterface $request, Endpoint $endpoint) : Response {
        $this->validateRequest($request, $endpoint);
        return $this->processRequest($request, $endpoint);
    }

    private function processRequest(RequestInterface  $request, Endpoint $endpoint) : Response
    {
        $response = $endpoint->{strtolower($request->getStartLine()->getHTTPMethod())}($request);
        return $response;
    }

    private function validateRequest(RequestInterface  $request, Endpoint $endpoint) : void
    {
        $this->requestEndpointValidator->endpointCanHandleRequest($endpoint, $request);
    }
}
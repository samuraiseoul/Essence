<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Endpoints\Hooks\HasPostware;
use Essence\Http\Endpoints\Hooks\HasPreware;
use Essence\Http\Endpoints\Middleware\Postware;
use Essence\Http\Endpoints\Middleware\Preware;
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
        $this->callPreware($endpoint, $request);
        $response = $endpoint->{strtolower($request->getStartLine()->getHTTPMethod())}($request);
        $this->callPostware($endpoint, $response);
        return $response;
    }

    private function validateRequest(RequestInterface  $request, Endpoint $endpoint) : void
    {
        $this->requestEndpointValidator->endpointCanHandleRequest($endpoint, $request);
        // TODO: Add Request format validation like ResponseFormat and make such a thing required
        // $request->validateRequestContentForEndpoint($this);
    }

    final private function callPreware(Endpoint $endpoint, RequestInterface  $request) : void
    {
        if($endpoint instanceof HasPreware) {
            /** @var Preware $preware */
            foreach($endpoint->getPreware() as $preware) {
                $preware->handle($request);
            }
        }
    }

    final private function callPostware(Endpoint $endpoint, Response $response) : void
    {
        if($endpoint instanceof HasPostware) {
            /** @var Postware $postware */
            foreach($endpoint->getPostware() as $postware) {
                $postware->handle($response);
            }
        }
    }
}
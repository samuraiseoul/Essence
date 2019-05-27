<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Endpoints\Hooks\HasPostware;
use Essence\Http\Endpoints\Hooks\HasPreware;
use Essence\Http\Endpoints\Middleware\EssencePostware;
use Essence\Http\Endpoints\Middleware\EssencePreware;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\RequestEndpointValidationInterface;
use Essence\Http\Messages\Response\EssenceResponse;

final class EndpointHandler implements EndpointHandlerInterface
{
    /** @var RequestEndpointValidationInterface */
    private $requestEndpointValidator;

    public function __construct(RequestEndpointValidationInterface $requestEndpointValidator)
    {
        $this->requestEndpointValidator = $requestEndpointValidator;
    }

    final public function handleEndpoint(EssenceRequest $request, Endpoint $endpoint) : EssenceResponse {
        $this->validateRequest($request, $endpoint);
        return $this->processRequest($request, $endpoint);
    }

    private function processRequest(EssenceRequest  $request, Endpoint $endpoint) : EssenceResponse
    {
        $this->callPreware($endpoint, $request);
        $response = $endpoint->{strtolower($request->getRestVerb())}($request);
        $this->callPostware($endpoint, $response);
        return $response;
    }

    private function validateRequest(EssenceRequest  $request, Endpoint $endpoint) : void
    {
        $this->requestEndpointValidator->endpointCanHandleRequest($endpoint, $request);
        // TODO: Add Request format validation like ResponseFormat and make such a thing required
        // $request->validateRequestContentForEndpoint($this);
    }

    final private function callPreware(Endpoint $endpoint, EssenceRequest  $request) : void
    {
        if($endpoint instanceof HasPreware) {
            /** @var EssencePreware $preware */
            foreach($endpoint->getPreware() as $preware) {
                $preware->handle($request);
            }
        }
    }

    final private function callPostware(Endpoint $endpoint, EssenceResponse $response) : void
    {
        if($endpoint instanceof HasPostware) {
            /** @var EssencePostware $postware */
            foreach($endpoint->getPostware() as $postware) {
                $postware->handle($response);
            }
        }
    }
}
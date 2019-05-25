<?php


namespace Essence\Http;


use Essence\Request\MethodRequests\RestRequest;
use Essence\Request\RequestFactory;
use Essence\Response\BaseResponse;

final class EndpointRunner
{
    final public function handleEndpoint(Endpoint $endpoint) : void {
        $request = $this->getRequest();
        $this->validateRequest($request, $endpoint);
        $this->emitResponse($this->processRequest($request, $endpoint));
    }

    private function getRequest() : RestRequest {
        return (new RequestFactory())->getRequest();
    }

    private function processRequest(RestRequest $request, Endpoint $endpoint) : BaseResponse
    {
        $endpoint->callPreware($request);
        $response = $this->{strtolower($request->getRestVerb())}($request);
        $endpoint->callPostware($response);
        return $response;
    }

    private function emitResponse(BaseResponse $response) : void
    {
        $response->emit();
    }

    private function validateRequest(RestRequest $request, Endpoint $endpoint) : void
    {
        $request->ensureEndpointCanHandleRestMethod($endpoint);
        // TODO: Add Request format validation like ResponseFormat and make such a thing required
        // $request->validateRequestContentForEndpoint($this);
    }
}
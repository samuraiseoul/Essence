<?php


namespace Essence\Http\Endpoints;


use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\Validator\RequestEndpointValidator;
use Essence\Http\Messages\Request\Wrapper\EssenceRequestWrapper;
use Essence\Http\Messages\Response\Response;
use Essence\Http\Messages\Response\Wrapper\ResponseWrapper;

final class EssenceEndpointHandler implements EndpointHandler
{
    /** @var RequestEndpointValidator */
    private $requestEndpointValidator;

    public function __construct(RequestEndpointValidator $requestEndpointValidator)
    {
        $this->requestEndpointValidator = $requestEndpointValidator;
    }

    public function handleEndpoint(Request $request, Endpoint $endpoint) : Response {
        $this->validateRequest($request, $endpoint);
        return $this->processRequest($request, $endpoint);
    }

    /**
     * @param Request $request
     * @param Endpoint $endpoint
     * @return Response
     */
    private function processRequest(Request $request, Endpoint $endpoint) : Response
    {
        /** @var ResponseWrapper $responseWrapper */
        $responseWrapper = $endpoint->{strtolower($request->getRequestStartLine()->getHTTPMethod())}(new EssenceRequestWrapper($request));
        return $responseWrapper->getResponse();
    }

    private function validateRequest(Request  $request, Endpoint $endpoint) : void
    {
        $this->requestEndpointValidator->endpointCanHandleRequest($endpoint, $request);
    }
}
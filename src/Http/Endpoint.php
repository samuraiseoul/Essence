<?php

namespace Essence\Http;

use Essence\Http\Hooks\HasPostware;
use Essence\Http\Hooks\HasPreware;
use Essence\Request\MethodRequests\RestRequest;
use Essence\Request\RequestFactory;
use Essence\Response\BaseResponse;

abstract class Endpoint
{
    public function __construct()
    {
        $request = (new RequestFactory())->getRequest();
        $this->validateRequest($request);
        $this->emitResponse($this->processRequest($request));
    }

    private function processRequest(RestRequest $request) : BaseResponse
    {
        $this->callPreware($request);
        $response = $this->{strtolower($request->getRestVerb())}($request);
        $this->callPostware($response);
        return $response;
    }

    private function callPreware(RestRequest $request) : void
    {
        if($this instanceof HasPreware) {
            /** @var Preware $preware */
            foreach($this->getPreware() as $preware) {
                $preware->handle($request);
            }
        }
    }

    private function callPostware(BaseResponse $response) : void
    {
        if($this instanceof HasPostware) {
            /** @var Postware $postware */
            foreach($this->getPostware() as $postware) {
                $postware->handle($response);
            }
        }
    }

    private function emitResponse(BaseResponse $response) : void
    {
        $response->emit();
    }

    private function validateRequest(RestRequest $request) : void
    {
        $request->ensureEndpointCanHandleRestMethod($this);
        // TODO: Add Request format validation like ResponseFormat and make such a thing required
        // $request->validateRequestContentForEndpoint($this);
    }
}
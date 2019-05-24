<?php


namespace Essence\Request;


use Essence\Request\MethodRequests\RestRequest;

final class RequestFactory
{
    public function getRequest() : RestRequest
    {
        $baseRequest = new class() extends Request {};
        $restRequestType = RestRequest::VERB_REQUEST_MAP[$baseRequest->getRestVerb()];
        return new $restRequestType();
    }
}
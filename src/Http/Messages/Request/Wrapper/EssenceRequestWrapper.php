<?php


namespace Essence\Http\Messages\Request\Wrapper;

use Essence\Http\Messages\Body\EssenceSingleResourceRequestBody;
use Essence\Http\Messages\Body\PostParameters;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\StartLine\QueryParameters;
use TypeError;

final class EssenceRequestWrapper implements RequestWrapper
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getQueryParameters() : QueryParameters {
        $startLine = $this->request->getRequestStartLine();
        return $startLine->getRequestTarget()->getQueryStrings();
    }

    public function getPostParameters() : PostParameters {
        $body = $this->request->getBody();
        if($body instanceof EssenceSingleResourceRequestBody) {
            return $body->getPostParameters();
        }
        throw new TypeError('Essence Request Wrapper created with invalid Body Type!');
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}
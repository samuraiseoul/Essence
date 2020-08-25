<?php


namespace Essence\Http\Messages\Request\Wrapper;

use Essence\Http\Messages\Body\EssencePostParametersInterface;
use Essence\Http\Messages\Body\EssenceSingleResourceRequestBodyInterface;
use Essence\Http\Messages\Request\EssenceRequestInterface;
use Essence\Http\Messages\Request\StartLine\EssenceQueryParametersInterface;
use TypeError;

final class EssenceRequestWrapper implements EssenceRequestWrapperInterface
{
    private EssenceRequestInterface $request;

    public function __construct(EssenceRequestInterface $request)
    {
        $this->request = $request;
    }

    public function getQueryParameters() : EssenceQueryParametersInterface {
        $startLine = $this->request->getRequestStartLine();
        return $startLine->getRequestTarget()->getQueryStrings();
    }

    public function getPostParameters() : EssencePostParametersInterface {
        $body = $this->request->getBody();
        if($body instanceof EssenceSingleResourceRequestBodyInterface) {
            return $body->getPostParameters();
        }
        throw new TypeError('Essence Request Wrapper created with invalid Body Type!');
    }

    public function getRequest(): EssenceRequestInterface
    {
        return $this->request;
    }
}
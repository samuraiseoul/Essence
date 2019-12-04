<?php


namespace Essence\Http\Messages\Request\Factory;


use BadMethodCallException;
use Essence\Http\Messages\Body\Body;
use Essence\Http\Messages\Headers\Headers;
use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\Factories\Body\RequestBodyFactory;
use Essence\Http\Messages\Request\Factories\Headers\RequestHeadersFactory;
use Essence\Http\Messages\Request\Factories\StartLine\RequestStartLineFactory;
use Essence\Http\Messages\Request\Request;
use Essence\Http\Messages\Request\StartLine\RequestStartLine;

final class EssenceRequestFactory implements RequestFactory
{
    private ?EssenceRequest $request = null;

    private RequestStartLineFactory $startLineFactory;

    private RequestHeadersFactory $headersFactory;

    private RequestBodyFactory $bodyFactory;

    public function __construct(RequestStartLineFactory $startLineFactory, RequestHeadersFactory $headersFactory, RequestBodyFactory $bodyFactory)
    {
        $this->startLineFactory = $startLineFactory;
        $this->headersFactory = $headersFactory;
        $this->bodyFactory = $bodyFactory;
    }

    public function getRequest(): Request
    {
        return $this->request ?? $this->request = $this->createEssenceRequest();
    }

    private function createEssenceRequest(): EssenceRequest
    {
        if($this->request) {
            throw new BadMethodCallException('Recreating immutable request!');
        }
        return new EssenceRequest($this->getStartLine(), $this->getHeaders(), $this->getRequestBody());
    }

    private function getStartLine(): RequestStartLine
    {
        return $this->startLineFactory->getStartLine();
    }

    private function getHeaders(): Headers
    {
        return $this->headersFactory->getHeaders();
    }

    private function getRequestBody(): Body
    {
        return $this->bodyFactory->getRequestBody();
    }
}
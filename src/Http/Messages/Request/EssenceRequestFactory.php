<?php


namespace Essence\Http\Messages\Request;


use BadMethodCallException;
use Essence\Http\Messages\Headers;
use Essence\Http\Messages\Request\Body\Factories\RequestBodyFactory;
use Essence\Http\Messages\Request\Body\RequestBody;
use Essence\Http\Messages\Request\Headers\Factories\RequestHeadersFactory;
use Essence\Http\Messages\Request\StartLine\Factories\RequestStartLineFactory;

final class EssenceRequestFactory implements RequestFactory
{
    /** @var EssenceRequest */
    private $request;

    /** @var RequestStartLineFactory */
    private $startLineFactory;

    /** @var RequestHeadersFactory */
    private $headersFactory;

    /** @var RequestBodyFactory */
    private $bodyFactory;

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
            throw new BadMethodCallException("Recreating immutable request!");
        }
        return new EssenceRequest($this->getStartLine(), $this->getHeaders(), $this->getRequestBody());
    }

    private function getStartLine(): StartLine\RequestStartLine
    {
        return $this->startLineFactory->getStartLine();
    }

    private function getHeaders(): Headers
    {
        return $this->headersFactory->getHeaders();
    }

    private function getRequestBody(): RequestBody
    {
        return $this->bodyFactory->getRequestBody();
    }
}